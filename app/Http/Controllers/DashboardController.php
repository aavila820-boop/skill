<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TutoringSession;
use App\Models\Mentor;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Cargar la relación mentor
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
        // Sesiones próximas (donde el usuario es ESTUDIANTE)
        $upcomingSessions = TutoringSession::where('student_id', $user->id)
            ->where('status', '!=', 'cancelled')
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        // Sesiones completadas
        $completedSessions = TutoringSession::where('student_id', $user->id)
            ->where('status', 'completed')
            ->count();

        // Total de horas
        $totalHours = TutoringSession::where('student_id', $user->id)
            ->where('status', 'completed')
            ->sum('duration') / 60;

        // Promedio de calificaciones
        $averageRating = TutoringSession::where('student_id', $user->id)
            ->where('status', 'completed')
            ->whereNotNull('rating')
            ->avg('rating');

        // Mentores disponibles (TODOS los mentores con available = true)
        $mentors = Mentor::where('available', true)
            ->with(['user', 'subjects'])
            ->get();

        return view('dashboard', compact(
            'user',
            'upcomingSessions',
            'completedSessions',
            'totalHours',
            'averageRating',
            'mentors'
        ));
    }

    /**
     * Dashboard para mentores
     */
   private function mentorDashboard($user)
{
    $mentor = $user->mentor;

    // Tutorías que tiene que DAR (pending o confirmed)
    $tutoringsToDo = TutoringSession::where('mentor_id', $mentor->id)
        ->whereIn('status', ['pending', 'confirmed'])
        ->with(['student', 'subject'])
        ->orderBy('scheduled_at', 'asc')
        ->get();

    // Tutorías que va a RECIBIR (donde él es estudiante)
    $tutoriasARecibir = TutoringSession::where('student_id', $user->id)
        ->where('status', '!=', 'cancelled')
        ->with(['mentor.user', 'subject'])
        ->orderBy('scheduled_at', 'asc')
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

    // Otros mentores disponibles
    $mentors = Mentor::where('available', true)
        ->where('id', '!=', $mentor->id)
        ->with(['user', 'subjects'])
        ->get();

    return view('mentor-dashboard', compact(
        'user',
        'mentor',
        'tutoringsToDo',
        'tutoriasARecibir',
        'completedSessions',
        'totalHours',
        'averageRating',
        'mentors'
    ));
}

}
