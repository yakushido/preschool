<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAttendance;
use App\Models\Attendance;

class DashboardController extends Controller
{
    /**
     * @param integer|null $year
     * @param integer|null $month
     * @return View
     */
    public function get(int $year = null, int $month = null): View
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

        $user_attendances = UserAttendance::where('user_id','=',Auth::id())->get();
        $attendance_lists = Attendance::all();

        return view('dashboard', compact(
            'weeks',
            'dates', 
            'firstDayOfMonth',
            'user_attendances',
            "attendance_lists"
        ));
    }
}
