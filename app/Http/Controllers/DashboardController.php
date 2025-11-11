<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\TutoringSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Separar tutorías activas (futuras o de hoy) vs expiradas (pasadas)
        $upcomingSessions = TutoringSession::where('student_id', $user->id)
            ->where('scheduled_at', '>=', $now)
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        $expiredSessions = TutoringSession::where('student_id', $user->id)
            ->where('scheduled_at', '<', $now)
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        // Buscar mentores disponibles
        $mentors = Mentor::with(['user', 'subjects'])
            ->where('user_id', '!=', $user->id)
            ->get();

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
            'mentors',
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

        // Tutorías que tiene que dar (pending o confirmed Y FUTURAS)
        $tutoringsToDo = TutoringSession::where('mentor_id', $mentor->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('scheduled_at', '>=', $now)
            ->with(['student', 'subject'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        // Tutorías EXPIRADAS (ya pasaron de fecha)
        $expiredSessions = TutoringSession::where('mentor_id', $mentor->id)
            ->where('scheduled_at', '<', $now)
            ->with(['student', 'subject'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        // Tutorías completadas
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

        // Tutorías que voy a RECIBIR como estudiante
        $tutoriasARecibir = TutoringSession::where('student_id', $user->id)
            ->where('scheduled_at', '>=', $now)
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        // Otros mentores disponibles (para que también puedan solicitar)
        $mentors = Mentor::where('user_id', '!=', $user->id)
            ->with(['user', 'subjects'])
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
            'mentors'
        ));
    }
}
