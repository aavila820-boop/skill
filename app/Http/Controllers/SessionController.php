<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TutoringSession;
use App\Models\Mentor;
use App\Models\Subject;

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
    
    // Si viene un mentor_id, obtenerlo y pre-seleccionarlo
    $selectedMentor = null;
    if ($mentorId) {
        $selectedMentor = Mentor::findOrFail($mentorId);
    }
    
    $mentors = Mentor::where('available', true)->with('user')->get();
    $subjects = Subject::all();
    
    return view('session-book', compact('mentors', 'subjects', 'selectedMentor', 'mentorId'));
}


    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'subject_id' => 'required|exists:subjects,id',
            'scheduled_at' => 'required|date|after:now',
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
                'status' => 'pending'
            ]);

            return redirect()->route('dashboard')->with('success', '✅ ¡Tutoría solicitada exitosamente!');
        } catch (\Exception $e) {
            return back()->with('error', '❌ Error: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
{
    $session = TutoringSession::findOrFail($id);
    $user = Auth::user();

    // Verificar autorización: Si eres mentor, debes ser el mentor de esta sesión
    $isMentorOfSession = ($user->mentor && $session->mentor_id == $user->mentor->id);
    $isStudentOfSession = ($session->student_id == $user->id);

    if (!$isMentorOfSession && !$isStudentOfSession) {
        return redirect()->back()->with('error', '❌ No tienes permiso para modificar esta sesión');
    }

    $request->validate([
        'status' => 'required|in:confirmed,completed,cancelled'
    ]);

    try {
        $updateData = ['status' => $request->status];

        if ($request->status === 'completed') {
            $updateData['completed_at'] = now();
        }

        $session->update($updateData);

        $messages = [
            'confirmed' => '✅ ¡Tutoría confirmada exitosamente!',
            'completed' => '✅ ¡Tutoría completada!',
            'cancelled' => '❌ Tutoría cancelada'
        ];

        return redirect()->back()->with('success', $messages[$request->status]);
    } catch (\Exception $e) {
        return back()->with('error', '❌ Error: ' . $e->getMessage());
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
