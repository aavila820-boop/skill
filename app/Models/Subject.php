<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'code',
        'faculty_id',
        'description'
    ];

    public function mentors()
    {
        return $this->belongsToMany(Mentor::class, 'mentor_subject');
    }

    public function sessions()
    {
        return $this->hasMany(TutoringSession::class);
    }
}
