<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Subject;

class ProfileController extends Controller
{
    /**
     * Show profile page
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Get profile data (API)
     */
    public function getProfileData()
    {
        $user = Auth::user();

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'program' => $user->program,
            'semester' => $user->semester,
            'bio' => $user->bio,
            'subjects' => $user->subjects->map(function($subject) {
                return [
                    'id' => $subject->id,
                    'name' => $subject->name,
                    'status' => $subject->pivot->status
                ];
            }),
            'stats' => [
                'totalSessions' => $user->sessions()->where('status', 'completed')->count(),
                'totalHours' => round($user->sessions()->where('status', 'completed')->sum('duration') / 60, 1),
                'averageRating' => $user->averageRating()
            ],
            'achievements' => $user->achievements->map(function($achievement) {
                return [
                    'id' => $achievement->id,
                    'name' => $achievement->name,
                    'description' => $achievement->description,
                    'icon' => $achievement->icon,
                    'date' => $achievement->pivot->unlocked_at->format('d/m/Y')
                ];
            }),
            'sessions' => $user->sessions()->with('mentor', 'subject')->latest()->take(10)->get()->map(function($session) {
                return [
                    'id' => $session->id,
                    'subject' => $session->subject->name,
                    'mentor_name' => $session->mentor->name,
                    'date' => $session->scheduled_at->format('d/m/Y'),
                    'duration' => $session->duration . ' min',
                    'status' => $session->status,
                    'rating' => $session->rating,
                    'notes' => $session->notes
                ];
            })
        ]);
    }

    /**
     * Update profile (API)
     */
    public function updateProfileData(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'bio' => 'sometimes|string|max:500',
            'program' => 'sometimes|string|max:255',
            'semester' => 'sometimes|integer|min:1|max:10',
            'subjects' => 'sometimes|array',
            'subjects.*.id' => 'exists:subjects,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $user->update($request->only(['name', 'bio', 'program', 'semester']));

        // Update subjects
        if ($request->has('subjects')) {
            $subjectIds = collect($request->subjects)->pluck('id')->toArray();
            $user->subjects()->sync($subjectIds);
        }

        return response()->json([
            'success' => true,
            'message' => 'Perfil actualizado exitosamente',
            'data' => $this->getProfileData()
        ]);
    }

    /**
     * Upload avatar
     */
    public function uploadAvatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'El archivo debe ser una imagen válida (jpeg, png, jpg, gif) de máximo 2MB'
            ], 422);
        }

        $user = Auth::user();

        // Delete old avatar if exists
        if ($user->avatar && Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }

        // Store new avatar
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->update(['avatar' => Storage::url($path)]);

        return response()->json([
            'success' => true,
            'message' => 'Avatar actualizado exitosamente',
            'avatar' => $user->avatar
        ]);
    }
}
