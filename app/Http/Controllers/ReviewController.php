<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\TutoringSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar datos
            $validated = $request->validate([
                'tutoring_session_id' => 'required|exists:tutoring_sessions,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|min:10'
            ]);

            $userId = Auth::id();
            $sessionId = $validated['tutoring_session_id'];

            // Obtener la sesión
            $session = TutoringSession::findOrFail($sessionId);

            // Verificar que el usuario sea ESTUDIANTE o MENTOR de la sesión
            $isStudent = $session->student_id === $userId;
            $isMentor = $session->mentor_id === $userId;

            if (!$isStudent && !$isMentor) {
                return response()->json([
                    'error' => 'No tienes permiso para reseñar esta tutoría'
                ], 403);
            }

            // Verificar si ya existe una reseña de este usuario
            $existingReview = Review::where('tutoring_session_id', $sessionId)
                ->where('student_id', $userId)
                ->first();

            if ($existingReview) {
                // Actualizar reseña existente
                $existingReview->update([
                    'rating' => $validated['rating'],
                    'comment' => $validated['comment']
                ]);
                $message = 'Reseña actualizada correctamente';
            } else {
                // Crear nueva reseña
                Review::create([
                    'tutoring_session_id' => $sessionId,
                    'student_id' => $userId,
                    'rating' => $validated['rating'],
                    'comment' => $validated['comment']
                ]);
                $message = 'Reseña guardada correctamente';
            }

            return response()->json([
                'success' => true,
                'message' => $message
            ]);

        } catch (\Exception $e) {
            Log::error('Error al guardar reseña: ' . $e->getMessage());
            return response()->json([
                'error' => 'Error al guardar la reseña: ' . $e->getMessage()
            ], 500);
        }
    }
}
