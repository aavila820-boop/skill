<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'program',
        'bio',
        'avatar',
        'semester',
        'role',
        'google_id',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ============= RELACIONES =============

    /**
     * Sesiones donde el usuario es ESTUDIANTE
     */
    public function sessions()
    {
        return $this->hasMany(TutoringSession::class, 'student_id');
    }

    /**
     * Perfil de tutor (si es tutor)
     */
    public function mentor()
    {
        return $this->hasOne(Mentor::class);
    }

    /**
     * Tutorías que da como MENTOR
     */
    public function mentoringSessions()
    {
        return $this->hasManyThrough(TutoringSession::class, Mentor::class, 'user_id', 'mentor_id');
    }

    // ============= MÉTODOS PERSONALIZADOS =============

    /**
     * Verifica si el usuario es tutor
     */
    public function isMentor()
    {
        return $this->role === 'mentor' && $this->mentor !== null;
    }

    /**
     * Verifica si el usuario es estudiante
     */
    public function isStudent()
    {
        return $this->role === 'student';
    }

    /**
     * Obtiene el nombre completo del usuario
     */
    public function getFullNameAttribute()
    {
        return $this->name;
    }

    /**
     * Obtiene las sesiones próximas del usuario (como estudiante)
     */
    public function getUpcomingSessionsAttribute()
    {
        return $this->sessions()
            ->where('scheduled_at', '>', now())
            ->where('status', '!=', 'cancelled')
            ->orderBy('scheduled_at', 'asc')
            ->get();
    }

    /**
     * Obtiene las sesiones completadas del usuario (como estudiante)
     */
    public function getCompletedSessionsAttribute()
    {
        return $this->sessions()
            ->where('status', 'completed')
            ->get();
    }

    /**
     * Calificación promedio como estudiante
     */
    public function getAverageRatingAttribute()
    {
        return $this->sessions()
            ->where('status', 'completed')
            ->whereNotNull('rating')
            ->avg('rating');
    }

    /**
     * Total de horas de tutorías recibidas
     */
    public function getTotalHoursAttribute()
    {
        return $this->sessions()
            ->where('status', 'completed')
            ->sum('duration') / 60;
    }

    /**
     * Verifica si puede ser tutor (tiene mentor profile)
     */
    public function canMentor()
    {
        return $this->role === 'mentor' && $this->mentor()->exists();
    }

    /**
     * Obtiene las tutorías que tiene que dar (como mentor)
     */
    public function getTutoriasToDoAttribute()
    {
        if (!$this->isMentor()) {
            return collect([]);
        }

        return TutoringSession::where('mentor_id', $this->mentor->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('scheduled_at', 'asc')
            ->get();
    }

    /**
     * Obtiene las tutorías completadas (como mentor)
     */
    public function getMentorCompletedSessionsAttribute()
    {
        if (!$this->isMentor()) {
            return 0;
        }

        return TutoringSession::where('mentor_id', $this->mentor->id)
            ->where('status', 'completed')
            ->count();
    }

    /**
     * Total de horas dictadas (como mentor)
     */
    public function getMentorTotalHoursAttribute()
    {
        if (!$this->isMentor()) {
            return 0;
        }

        return TutoringSession::where('mentor_id', $this->mentor->id)
            ->where('status', 'completed')
            ->sum('duration') / 60;
    }

    /**
     * Calificación promedio como mentor
     */
    public function getMentorAverageRatingAttribute()
    {
        if (!$this->isMentor()) {
            return 0;
        }

        return TutoringSession::where('mentor_id', $this->mentor->id)
            ->where('status', 'completed')
            ->whereNotNull('rating')
            ->avg('rating');
    }

    // Relación para obtener reseñas que este usuario recibió como mentor
    public function reviews()
    {
        return $this->hasMany(Review::class, 'mentor_id');
    }

    public function getAverageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function getReviewCount()
    {
        return $this->reviews()->count();
    }
}
