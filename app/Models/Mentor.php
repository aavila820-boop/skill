<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mentor extends Model
{
    protected $fillable = [
        'user_id',
        'faculty_id',
        'program',
        'bio',
        'available',
        'average_rating',
        'total_sessions'
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'mentor_subject');
    }

    public function sessions()
    {
        return $this->hasMany(TutoringSession::class);
    }

    // Relación para obtener todas las reseñas del mentor
    public function reviews()
    {
        return $this->hasManyThrough(
            \App\Models\Review::class,
            \App\Models\TutoringSession::class,
            'mentor_id',           // FK en tutoring_sessions
            'tutoring_session_id'  // FK en reviews
        );
    }

    // Atributo calculado para obtener promedio de rating
    public function getAverageRatingCalculatedAttribute()
    {
        $avg = DB::table('reviews')
            ->whereIn('tutoring_session_id', 
                $this->sessions()
                    ->where('status', 'completed')
                    ->pluck('id')
            )
            ->avg('rating');
        
        return $avg ? round($avg, 1) : 0;
    }

    // Atributo calculado para contar reseñas
    public function getReviewCountAttribute()
    {
        return DB::table('reviews')
            ->whereIn('tutoring_session_id', 
                $this->sessions()
                    ->where('status', 'completed')
                    ->pluck('id')
            )
            ->count();
    }
}
