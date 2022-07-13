<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UserAttendance;

class TeacherController extends Controller
{
    public function show()
    {
        $teacher = Teacher::where('id', Auth::id())->first();
        $team_users = User::where('team_id', $teacher['team_id'])->get();
        $attendances = UserAttendance::all()->sortByDesc("date");

        return view('admin.teacher',compact('teacher','team_users', 'attendances'));
    }

    public function search(Request $request)
    {
        $keyword_from = $request->input('from');
        $keyword_until = $request->input('until');

        $query = UserAttendance::query();

        if (!empty($keyword_from) && !empty($keyword_until)) {
            $attendances = $query->whereBetween('date', [$keyword_from, $keyword_until])->get();
        }

        $teacher = Teacher::where('id', Auth::id())->first();
        $team_users = User::where('team_id', $teacher['team_id'])->get();

        return view('admin.teacher', compact('teacher', 'team_users', 'attendances'));
    }
}