<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TutoringSession extends Model
{
    protected $table = 'tutoring_sessions';

    protected $fillable = [
        'student_id',
        'mentor_id',
        'subject_id',
        'type',
        'scheduled_at',
        'duration',
        'status',
        'notes',
        'student_notes',
        'rating',
        'review',
        'completed_at',
        'meeting_link',
        'location'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // Relaciones
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'tutoring_session_id');
    }
}
