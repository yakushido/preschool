<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UserAttendance;
use App\Models\Attendance;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacher = Teacher::find(Auth::id());
        $team_users = User::where('team_id','=',$teacher['team_id'])->get();
        $attendance_lists = Attendance::all();
        $today_attendances = UserAttendance::where('date','=',Carbon::now()->format('Y-m-d'))->get();

        return view('teacher.dashboard',compact(
            'teacher',
            'team_users',
            'attendance_lists',
            'today_attendances'
        ));
    }

    /**
     * @param integer|null $year
     * @param integer|null $month
     * @return View
     */
    public function user_detail($id, int $year = null, int $month = null): View
    {
        $weeks = ['日', '月', '火', '水', '木', '金', '土'];

        $carbon = new Carbon();
        $carbon->locale('ja_JP');

        if ($year) {
            $carbon->setYear($year);
        }
        if ($month) {
            $carbon->setMonth($month);
        }
        $carbon->setDay(1);
        $carbon->setTime(0, 0);

        $firstDayOfMonth = $carbon->copy()->firstOfMonth();
        $lastOfMonth = $carbon->copy()->lastOfMonth();

        $firstDayOfCalendar = $firstDayOfMonth->copy()->startOfWeek();
        $endDayOfCalendar = $lastOfMonth->copy()->endOfWeek();

        $dates = [];
        while ($firstDayOfCalendar < $endDayOfCalendar) {
            $dates[] = $firstDayOfCalendar->copy();
            $firstDayOfCalendar->addDay();
        }

        $user_detail = User::find($id);
        $user_attendances = UserAttendance::where('user_id','=',$user_detail['id'])->get();
        $attendance_lists = Attendance::all();

        return view('teacher.user_detail', compact(
            'weeks',
            'dates', 
            'firstDayOfMonth',
            'user_detail',
            'user_attendances',
            'attendance_lists'
        ));
    }
}
