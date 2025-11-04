<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use App\Models\Achievement;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display dashboard
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    /**
     * Get dashboard statistics (API)
     */
    public function getStats(Request $request)
    {
        $user = Auth::user();

        // Weekly progress
        $weeklyProgress = $this->getWeeklyProgress($user);

        // Upcoming sessions
        $upcomingSessions = Session::where('student_id', $user->id)
            ->where('status', 'upcoming')
            ->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at', 'asc')
            ->with('mentor')
            ->limit(5)
            ->get()
            ->map(function($session) {
                return [
                    'id' => $session->id,
                    'mentor_name' => $session->mentor->name,
                    'subject' => $session->subject->name,
                    'time' => $session->scheduled_at->format('d/m/Y H:i'),
                    'duration' => $session->duration . ' min'
                ];
            });

        // Completed challenges
        $completedChallenges = Achievement::where('user_id', $user->id)
            ->where('unlocked_at', '>=', Carbon::now()->subDays(7))
            ->get()
            ->map(function($achievement) {
                return [
                    'id' => $achievement->id,
                    'name' => $achievement->name,
                    'description' => $achievement->description,
                    'icon' => $achievement->icon,
                    'points' => $achievement->points
                ];
            });

        // Overall statistics
        $stats = [
            'totalSessions' => Session::where('student_id', $user->id)
                ->where('status', 'completed')
                ->count(),
            'totalHours' => Session::where('student_id', $user->id)
                ->where('status', 'completed')
                ->sum('duration') / 60,
            'averageRating' => $user->averageRating() ?? 0
        ];

        return response()->json([
            'weeklyProgress' => $weeklyProgress,
            'upcomingSessions' => $upcomingSessions,
            'completedChallenges' => $completedChallenges,
            'stats' => $stats
        ]);
    }

    /**
     * Calculate weekly progress
     */
    private function getWeeklyProgress($user)
    {
        $progress = [];
        $days = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->subDays(6 - $i);
            $hours = Session::where('student_id', $user->id)
                ->where('status', 'completed')
                ->whereDate('completed_at', $date)
                ->sum('duration') / 60;

            $progress[] = [
                'day' => $days[$i],
                'hours' => round($hours, 1),
                'date' => $date->format('Y-m-d')
            ];
        }

        return $progress;
    }
}
