<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\TutoringSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use Illuminate\Database\Migrations\Migration;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('mentor');

        // Verificar si el usuario tiene un perfil de mentor creado
        if ($user->role === 'mentor' && $user->mentor !== null) {
            return $this->mentorDashboard($user);
        }

        // Si es estudiante o no tiene mentor profile
        return $this->studentDashboard($user);
    }

    /**
     * Dashboard para estudiantes
     */
    private function studentDashboard($user)
    {
        $now = now();

        // Tutorías activas (futuras o de hoy)
        $upcomingSessions = TutoringSession::where('student_id', $user->id)
            ->whereDate('scheduled_at', '>=', today()) // ← CAMBIADO: Compara solo fecha
            ->whereIn('status', ['pending', 'confirmed'])
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        // Actualizar status de sesiones pasadas
        TutoringSession::where('student_id', $user->id)
            ->where('scheduled_at', '<', $now)
            ->where('status', 'confirmed')
            ->update(['status' => 'completed']);

        // Sesiones expiradas/completadas
        $expiredSessions = TutoringSession::where('student_id', $user->id)
            ->where('scheduled_at', '<', $now)
            ->with(['mentor.user', 'subject', 'reviews'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        // Tutorías rechazadas ← NUEVO
        $rejectedSessions = TutoringSession::where('student_id', $user->id)
            ->where('status', 'rejected')
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        // Buscar mentores disponibles
        $mentors = Mentor::with(['user', 'subjects', 'reviews'])
            ->where('user_id', '!=', $user->id)
            ->get();

        // Obtener todas las materias
        $subjects = Subject::all();

        // Stats
        $completedSessions = TutoringSession::where('student_id', $user->id)
            ->where('status', 'completed')
            ->count();

        $totalHours = TutoringSession::where('student_id', $user->id)
            ->where('status', 'completed')
            ->sum('duration') / 60;

        $averageRating = TutoringSession::where('student_id', $user->id)
            ->where('status', 'completed')
            ->whereNotNull('rating')
            ->avg('rating');

        return view('dashboard', compact(
            'user',
            'upcomingSessions',
            'expiredSessions',
            'rejectedSessions',      // ← NUEVO
            'mentors',
            'subjects',
            'completedSessions',
            'totalHours',
            'averageRating'
        ));
    }

    /**
     * Dashboard para mentores
     */
    private function mentorDashboard($user)
    {
        $mentor = $user->mentor;
        $now = now();

        // Tutorías por dar (pending o confirmed - hoy o futuro)
        $tutoringsToDo = TutoringSession::where('mentor_id', $mentor->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->whereDate('scheduled_at', '>=', today())
            ->with(['student', 'subject'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        // Actualizar status de sesiones pasadas
        TutoringSession::where('mentor_id', $mentor->id)
            ->where('scheduled_at', '<', $now)
            ->where('status', 'confirmed')
            ->update(['status' => 'completed']);

        // Tutorías expiradas (pasadas)
        $expiredSessions = TutoringSession::where('mentor_id', $mentor->id)
            ->where('scheduled_at', '<', $now)
            ->with(['student', 'subject', 'reviews'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        // Tutorías completadas (contador)
        $completedSessions = TutoringSession::where('mentor_id', $mentor->id)
            ->where('status', 'completed')
            ->count();

        // Total de horas dictadas
        $totalHours = TutoringSession::where('mentor_id', $mentor->id)
            ->where('status', 'completed')
            ->sum('duration') / 60;

        // Calificación promedio
        $averageRating = TutoringSession::where('mentor_id', $mentor->id)
            ->where('status', 'completed')
            ->whereNotNull('rating')
            ->avg('rating');

        // Tutorías que recibe como estudiante
        $tutoriasARecibir = TutoringSession::where('student_id', $user->id)
            ->whereDate('scheduled_at', '>=', today())
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        // ← NUEVO: Tutorías recibidas (historiales/completadas como estudiante)
        $receivedSessions = TutoringSession::where('student_id', $user->id)
            ->where('status', 'completed')
            ->with(['mentor.user', 'subject', 'reviews'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        // Otros mentores disponibles
        $mentors = Mentor::where('user_id', '!=', $user->id)
            ->with(['user', 'subjects', 'reviews'])
            ->get();

        // Reseñas del mentor
        $mentorReviews = Review::whereIn(
            'tutoring_session_id',
            $mentor->sessions()
                ->where('status', 'completed')
                ->pluck('id')
        )
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mentor-dashboard', compact(
            'user',
            'mentor',
            'tutoringsToDo',
            'expiredSessions',
            'completedSessions',
            'totalHours',
            'averageRating',
            'tutoriasARecibir',
            'receivedSessions',  // ← NUEVO
            'mentors',
            'mentorReviews'
        ));
    }
}
