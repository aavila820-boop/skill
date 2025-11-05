<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
