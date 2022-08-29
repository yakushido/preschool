<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\EventDate;
use App\Models\UserAttendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at','desc')-> paginate(4);

        $event_lists = EventDate::orderBy('date','desc')->paginate(5);

        $today_attendance = UserAttendance::where('user_id','=',Auth::id())->where('date','=',Carbon::now()->format("Y-m-d"))->first();

        return view('welcome', compact(
            'blogs',
            'event_lists',
            'today_attendance'
        ));
    }
}
