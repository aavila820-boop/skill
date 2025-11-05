<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show user profile
     */
    public function show()
    {
        $user = Auth::user();
        $sessions = $user->sessions()->with('mentor.user', 'subject')->limit(5)->get();
        
        return view('profile', compact('user', 'sessions'));
    }

    /**
     * Show edit form
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile-edit', compact('user'));
    }

    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'program' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload avatar if provided
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'program' => $request->program,
            'bio' => $request->bio,
        ]);

        return redirect()->route('profile')->with('success', 'Perfil actualizado exitosamente');
    }

    /**
     * API: Get profile data
     */
    public function getProfileData()
    {
        $user = Auth::user();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'program' => $user->program,
            'bio' => $user->bio,
            'avatar' => $user->avatar ? Storage::url($user->avatar) : null,
            'created_at' => $user->created_at->format('d/m/Y')
        ]);
    }

    /**
     * API: Update profile data (AJAX)
     */
    public function updateProfileData(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'program' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500'
        ]);

        $user->update([
            'name' => $request->name,
            'program' => $request->program,
            'bio' => $request->bio
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Perfil actualizado',
            'user' => $user
        ]);
    }

    /**
     * API: Upload avatar
     */
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        // Delete old avatar
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');
        $user->update(['avatar' => $path]);

        return response()->json([
            'success' => true,
            'message' => 'Avatar actualizado',
            'avatar_url' => Storage::url($path)
        ]);
    }

    /**
     * Change password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'La contraseña actual es incorrecta');
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Contraseña actualizada exitosamente');
    }
}
