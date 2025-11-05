<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use App\Models\TutoringSession;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
})->name('home');

// ============= AUTHENTICATION ROUTES =============
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// ============= PROTECTED ROUTES (Auth Required) =============
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Sessions
    Route::get('/session', [SessionController::class, 'index'])->name('session.index');
    Route::get('/session/create', [SessionController::class, 'create'])->name('session.create');
    Route::post('/session', [SessionController::class, 'store'])->name('session.store');
    Route::get('/session/{id}', [SessionController::class, 'show'])->name('session.show');
    Route::put('/session/{id}', [SessionController::class, 'update'])->name('session.update');
    Route::delete('/session/{id}', [SessionController::class, 'destroy'])->name('session.destroy');

    Route::get('/profile', function () {
        $user = Auth::user();
        $sessions = TutoringSession::where('student_id', $user->id)
            ->with(['mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('profile', compact('user', 'sessions'));
    })->name('profile');

// Ruta GET para MOSTRAR el formulario de edición
Route::get('/profile/edit', function () {
    $user = Auth::user();
    $sessions = TutoringSession::where('student_id', $user->id)
        ->with(['mentor.user', 'subject'])
        ->orderBy('scheduled_at', 'desc')
        ->get();
    
    return view('profile-edit', compact('user', 'sessions'));
})->name('profile.edit');

// Ruta POST para GUARDAR los cambios
Route::post('/profile/update', function (Request $request) {
    $user = Auth::user();
    $user->name = $request->input('name') ?? $user->name;
    $user->email = $request->input('email') ?? $user->email;
    $user->program = $request->input('program') ?? $user->program;
    $user->bio = $request->input('bio') ?? $user->bio;
    $user->save();

    return redirect()->route('profile')->with('success', '✅ Perfil actualizado exitosamente');
})->name('profile.update');

});
