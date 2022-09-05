<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAttendance;
use App\Models\Attendance;
use App\Http\Requests\AttendanceRequest;

class AttendanceController extends Controller
{
    public function add(AttendanceRequest $request, $id)
    {
        UserAttendance::create([
            'attendance_id' => $request->attendance_id,
            'date' => $request->date,
            'user_id' => $id
        ]);

        return redirect()
            ->back()
            ->withStatus("送信しました");

    }

    public function delete($id, $date)
    {
        UserAttendance::where('user_id','=',$id)->where('date','=',$date)->delete();

        return redirect()
            ->back()
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

        return redirect()
            ->route('dashboard')
            ->withStatus("更新しました");
    }

}
