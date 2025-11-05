<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;

class MentorController extends Controller
{
    /**
     * Display list of mentors
     */
    public function index()
    {
        $mentors = Mentor::where('available', true)
            ->with('subjects', 'user')
            ->get();
        
        return view('mentors', compact('mentors'));
    }

    /**
     * Show mentor details
     */
    public function show($id)
    {
        $mentor = Mentor::with('subjects', 'user')->findOrFail($id);
        
        return view('mentor-detail', compact('mentor'));
    }

    /**
     * API: Get all mentors
     */
    public function getMentors()
    {
        $mentors = Mentor::where('available', true)
            ->with('subjects', 'user')
            ->get()
            ->map(function($mentor) {
                return [
                    'id' => $mentor->id,
                    'name' => $mentor->user->name,
                    'program' => $mentor->program,
                    'subjects' => $mentor->subjects->pluck('name'),
                    'rating' => $mentor->average_rating,
                    'total_sessions' => $mentor->total_sessions,
                ];
            });

        return response()->json($mentors);
    }

    /**
     * API: Get mentor details
     */
    public function getMentorDetails($id)
    {
        $mentor = Mentor::with('subjects', 'user')->findOrFail($id);

        return response()->json([
            'id' => $mentor->id,
            'name' => $mentor->user->name,
            'email' => $mentor->user->email,
            'program' => $mentor->program,
            'bio' => $mentor->bio,
            'subjects' => $mentor->subjects->pluck('name'),
            'rating' => $mentor->average_rating,
            'total_sessions' => $mentor->total_sessions,
            'available' => $mentor->available,
        ]);
    }
}
