<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Subject;

class MentorController extends Controller
{
    /**
     * Display mentors search page
     */
    public function index()
    {
        return view('mentors');
    }

    /**
     * Get mentors list (API)
     */
    public function getMentors(Request $request)
    {
        $query = Mentor::with(['subjects', 'faculty', 'ratings']);

        // Search by name, subject, or program
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('program', 'like', "%{$search}%")
                  ->orWhereHas('subjects', function($sq) use ($search) {
                      $sq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by faculty
        if ($request->has('faculty') && $request->faculty !== 'all') {
            $query->where('faculty_id', $request->faculty);
        }

        // Filter by subject
        if ($request->has('subject') && $request->subject !== 'all') {
            $query->whereHas('subjects', function($q) use ($request) {
                $q->where('subjects.id', $request->subject);
            });
        }

        // Filter by availability
        if ($request->has('available')) {
            $query->where('available', $request->available);
        }

        // Sorting
        switch ($request->get('sort', 'rating')) {
            case 'rating':
                $query->orderByDesc('average_rating');
                break;
            case 'sessions':
                $query->orderByDesc('total_sessions');
                break;
            case 'name':
                $query->orderBy('name');
                break;
        }

        $mentors = $query->get()->map(function($mentor) {
            return [
                'id' => $mentor->id,
                'name' => $mentor->name,
                'avatar' => $mentor->avatar,
                'program' => $mentor->program,
                'faculty' => $mentor->faculty->name,
                'subjects' => $mentor->subjects->pluck('name')->toArray(),
                'rating' => $mentor->average_rating,
                'totalSessions' => $mentor->total_sessions,
                'available' => $mentor->available,
                'bio' => $mentor->bio
            ];
        });

        return response()->json($mentors);
    }

    /**
     * Show mentor details
     */
    public function show($id)
    {
        $mentor = Mentor::with(['subjects', 'faculty', 'ratings.student'])
            ->findOrFail($id);

        return view('mentor-detail', compact('mentor'));
    }

    /**
     * Get mentor details (API)
     */
    public function getMentorDetails($id)
    {
        $mentor = Mentor::with(['subjects', 'faculty', 'availableSlots', 'ratings'])
            ->findOrFail($id);

        return response()->json([
            'id' => $mentor->id,
            'name' => $mentor->name,
            'avatar' => $mentor->avatar,
            'program' => $mentor->program,
            'faculty' => $mentor->faculty->name,
            'bio' => $mentor->bio,
            'subjects' => $mentor->subjects,
            'rating' => $mentor->average_rating,
            'totalSessions' => $mentor->total_sessions,
            'available' => $mentor->available,
            'availableSlots' => $mentor->availableSlots,
            'reviews' => $mentor->ratings->take(5)->map(function($rating) {
                return [
                    'student' => $rating->student->name,
                    'rating' => $rating->rating,
                    'comment' => $rating->comment,
                    'date' => $rating->created_at->diffForHumans()
                ];
            })
        ]);
    }
}
