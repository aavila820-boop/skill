<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TutoringSession;
use App\Models\Mentor;
use App\Models\Subject;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;




class SessionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sessions = TutoringSession::where('student_id', $user->id)
            ->orWhere('mentor_id', $user->id)
            ->with(['student', 'mentor.user', 'subject'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('sessions', compact('sessions'));
    }

    public function create(Request $request)
{
    $mentorId = $request->query('mentor_id');
    
    // Si viene un mentor_id, obtenerlo CON SUS MATERIAS
    $selectedMentor = null;
    if ($mentorId) {
        $selectedMentor = Mentor::with('subjects')->findOrFail($mentorId);
    }
    
    // Obtener todos los mentores disponibles con sus materias
    $mentors = Mentor::where('available', true)->with(['user', 'subjects'])->get();
    
    // ← AGREGA ESTA LÍNEA
    $subjects = Subject::all();
    
    return view('session-book', compact('mentors', 'subjects', 'selectedMentor', 'mentorId'));
}



    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'subject_id' => 'required|exists:subjects,id',
            'scheduled_at' => 'required|date|after_or_equal:today',
            'duration' => 'required|integer|min:30|max:180',
            'type' => 'required|in:presencial,virtual',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500'
        ]);

        try {
            TutoringSession::create([
                'student_id' => Auth::id(),
                'mentor_id' => $request->mentor_id,
                'subject_id' => $request->subject_id,
                'scheduled_at' => $request->scheduled_at,
                'duration' => $request->duration,
                'type' => $request->type,
                'location' => $request->location,
                'notes' => $request->notes,
                'status' => 'pending' // <-- aquí asegúrate que siempre sea 'pending'
            ]);

            return redirect()->route('dashboard')->with('success', '✅ ¡Tutoría solicitada exitosamente!');
        } catch (\Exception $e) {
            return back()->with('error', '❌ Error: ' . $e->getMessage());
        }
    }


   public function update(Request $request, $id)
{
    try {
        $session = TutoringSession::findOrFail($id);
        $user = Auth::user();

        $isMentorOfSession = ($user->mentor && $session->mentor_id == $user->mentor->id);
        $isStudentOfSession = ($session->student_id == $user->id);

        if (!$isMentorOfSession && !$isStudentOfSession) {
            return response()->json(['error' => 'No tienes permiso'], 403);
        }

        $request->validate([
            'status' => 'required|in:confirmed,completed,cancelled,rejected'
        ]);

        $updateData = ['status' => $request->status];

        if ($request->status === 'completed') {
            $updateData['completed_at'] = now();
        }

        $session->update($updateData);

        return response()->json(['success' => true, 'message' => 'Actualizado correctamente']);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}




    public function destroy($id)
    {
        $session = TutoringSession::findOrFail($id);

        if ($session->student_id != Auth::id() && $session->mentor_id != Auth::id()) {
            abort(403);
        }

        $session->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', '❌ Sesión cancelada');
    }

    public function show($id)
    {
        $session = TutoringSession::with(['student', 'mentor.user', 'subject'])->findOrFail($id);
        return view('session-detail', compact('session'));
    }
}
