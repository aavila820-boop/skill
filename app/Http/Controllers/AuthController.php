<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'ends_with:@unab.edu.co'],
            'password' => 'required|min:8'
        ], [
            'email.ends_with' => 'Debes usar tu correo institucional UNAB (@unab.edu.co)',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'redirect' => route('dashboard'),
                'message' => 'Inicio de sesión exitoso'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Las credenciales proporcionadas son incorrectas.'
        ], 401);
    }

    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'unique:users', 'ends_with:@unab.edu.co'],
            'password' => 'required|string|min:8|confirmed',
            'program' => 'nullable|string|max:255',
            'semester' => 'nullable|integer|min:1|max:10'
        ], [
            'email.ends_with' => 'Debes usar tu correo institucional UNAB (@unab.edu.co)',
            'email.unique' => 'Este correo ya está registrado',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'program' => $request->program,
            'semester' => $request->semester,
            'role' => 'student'
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'redirect' => route('dashboard'),
            'message' => 'Registro exitoso. ¡Bienvenido al Plan Padrino!'
        ]);
    }

    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Validate UNAB email
            if (!str_ends_with($googleUser->email, '@unab.edu.co')) {
                return redirect('/login')->with('error', 'Debes usar tu correo institucional UNAB');
            }

            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'role' => 'student',
                    'email_verified_at' => now()
                ]);
            }

            Auth::login($user);

            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error al autenticar con Google');
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
