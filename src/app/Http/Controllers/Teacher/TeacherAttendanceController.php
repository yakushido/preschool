<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAttendance;
use App\Models\Attendance;

class TeacherAttendanceController extends Controller
{
    public function add(Request $request, $id)
    {
        UserAttendance::create([
            'attendance_id' => $request->attendance_id,
            'date' => $request->date,
            'user_id' => $id
        ]);

        return redirect()
            ->back()
            ->withStatus("追加しました");

    }

    public function delete($id)
    {
        UserAttendance::find($id)->delete();

        return redirect()
            ->back()
            ->withStatus("削除しました");
    }

    public function update(Request $request, $id)
    {
        $user_attendance_update = UserAttendance::find($id);

        $user_attendance_update['attendance_id'] = $request['attendance_id'];

        $user_attendance_update->save();

        $attendance_lists = Attendance::all();

        return redirect()
            ->route('teacher.user_detail',['id' => $user_attendance_update['user_id']])
            ->withStatus("更新しました");
    }
}
