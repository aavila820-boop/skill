<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes - Plan Padrino Digital UNAB
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Mentors
    Route::get('/mentors', [MentorController::class, 'index'])->name('mentors');
    Route::get('/mentor/{id}', [MentorController::class, 'show'])->name('mentor.show');

    // Sessions
    Route::get('/sessions', [SessionController::class, 'index'])->name('sessions');
    Route::get('/session/book', [SessionController::class, 'create'])->name('session.book');
    Route::post('/session/book', [SessionController::class, 'store'])->name('session.store');
    Route::get('/session/{id}', [SessionController::class, 'show'])->name('session.show');
    Route::put('/session/{id}', [SessionController::class, 'update'])->name('session.update');
    Route::delete('/session/{id}', [SessionController::class, 'destroy'])->name('session.cancel');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])->prefix('api')->group(function () {

    // Dashboard API
    Route::get('/dashboard/stats', [DashboardController::class, 'getStats']);

    // Profile API
    Route::get('/profile', [ProfileController::class, 'getProfileData']);
    Route::put('/profile', [ProfileController::class, 'updateProfileData']);
    Route::post('/profile/avatar', [ProfileController::class, 'uploadAvatar']);

    // Mentors API
    Route::get('/mentors', [MentorController::class, 'getMentors']);
    Route::get('/mentor/{id}', [MentorController::class, 'getMentorDetails']);

    // Sessions API
    Route::get('/sessions', [SessionController::class, 'getSessions']);
    Route::post('/sessions', [SessionController::class, 'createSession']);
    Route::get('/session/{id}', [SessionController::class, 'getSessionDetails']);
    Route::put('/session/{id}/rate', [SessionController::class, 'rateSession']);
});
