<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ===== LOGIN =====
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', '¡Bienvenido!');
        }

        return back()->withErrors(['email' => 'Credenciales inválidas'])->onlyInput('email');
    }

    // ===== REGISTER =====
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'want_to_be_mentor' => 'nullable|boolean',
        'mentor_type' => 'nullable|in:professor,student',
        'specialization' => 'nullable|string|max:255',
        'experience' => 'nullable|string',
        'years_experience' => 'nullable|integer',
        'achievements' => 'nullable|string',
        'average_grade' => 'nullable|numeric',
        'semester' => 'nullable|integer',
        'area_specialty' => 'nullable|string',
    ]);

    // Crear usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->want_to_be_mentor ? 'mentor' : 'student'
    ]);

    // Si quiere ser tutor, crear el perfil de mentor
    if ($request->want_to_be_mentor && $request->mentor_type) {
        $bio = "";
        $program = $request->specialization ?? "No especificado";

        if ($request->mentor_type === 'professor') {
            $bio = "Profesor con {$request->years_experience} años de experiencia.\n\n"
                 . "Especialización: {$request->specialization}\n\n"
                 . "Logros: {$request->achievements}";
        } else {
            $program = $request->area_specialty ?? "No especificado";
            $user->update([
                'semester' => $request->semester,
                'program' => $request->area_specialty
            ]);
            
            $bio = "Estudiante de {$request->semester}° semestre.\n\n"
                 . "Especialización: {$request->area_specialty}\n\n"
                 . "Promedio: {$request->average_grade}/5.0";
        }

        // Crear perfil de mentor
        \App\Models\Mentor::create([
            'user_id' => $user->id,
            'program' => $program,
            'bio' => $bio,
            'available' => true,
            'average_rating' => 5.0,
            'total_sessions' => 0
        ]);
    }

    // Iniciar sesión
    Auth::login($user);
    
    return redirect()->route('dashboard')->with('success', '¡Registro exitoso!');
}

/**
 * Logout
 */
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home')->with('success', 'Sesión cerrada exitosamente.');
}


}
