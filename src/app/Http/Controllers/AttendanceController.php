<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAttendance;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function add(Request $request)
    {
        if( Auth::guard("users")->check() ){
            UserAttendance::create([
                'attendance_id' => $request->attendance_id,
                'date' => $request->date,
                'user_id' => Auth::id()
            ]);

            return redirect()
            ->route('index')
            ->withStatus("送信しました");
        }elseif( Auth::guard("teachers")->check() ){
            UserAttendance::create([
                'attendance_id' => $request->attendance_id,
                'date' => $request->date,
                'user_id' => $request->user_id
            ]);

            return redirect()
            ->route('teacher.dashboard')
            ->withStatus("追加しました");
        }
        
        
    }

    public function delete(Request $request)
    {
        $user_attensance_delete = UserAttendance::where('date','=',$request->date)
            ->where('user_id','=',Auth::id())
            ->delete();

        return redirect()
            ->route('index')
            ->withStatus("削除しました");
    }

    public function another_day_get()
    {
        $attendance_lists = Attendance::all();

        return view('attendance_another_day',compact(
            'attendance_lists'
        ));
    }
    public function update(Request $request, $id)
    {
        $user_attendance_update = UserAttendance::find($id);

        $user_attendance_update['attendance_id'] = $request['attendance_id'];

        $user_attendance_update->save();

        $attendance_lists = Attendance::all();

        if( Auth::guard("users")->check() ){
            return redirect()
                ->route('dashboard')
                ->withStatus("更新しました");
        }elseif( Auth::guard("teachers")->check() ){
            return redirect()
                ->route('teacher.user_detail',['id' => $user_attendance_update['user_id']])
                ->withStatus("更新しました");
        }
    }

}
