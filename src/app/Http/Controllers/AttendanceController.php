<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AttendanceRequest;
use App\Models\UserAttendance;
use App\Models\Attendance;
use App\Models\Reason;

class AttendanceController extends Controller
{
    public function add(AttendanceRequest $request)
    {
            if($request->has('attend')){
            UserAttendance::create([
                'user_id' => $request->id,
                'attendance_id' => 1,
                'date' => $request->date
            ]);
            } elseif ($request->has('absence')) {
                UserAttendance::create([
                    'user_id' => $request->id,
                    'attendance_id' => 2,
                    'date' => $request->date
                ]);
            }
            return redirect()->route('teacher.show');
    }

    public function delete($id)
    {
        UserAttendance::find($id)->delete();

        return redirect()->route('teacher.show');
    }

    public function update($id)
    {
        $update_attendance = UserAttendance::find($id);

        if($update_attendance['attendance_id'] === 1) {
            $update_attendance['attendance_id'] = 2;
        }elseif ($update_attendance['attendance_id'] === 2) {
            $update_attendance['attendance_id'] = 1;
        }
        $update_attendance->save();

        return redirect()->route('teacher.show');
    }

    public function user_show()
    {
        $attendances = Attendance::all();
        $reasons = Reason::all();
        $user_attendances = UserAttendance::where('user_id', Auth::id())->get();

        return view('attendance', compact('attendances','reasons', 'user_attendances'));
    }

    public function user_add(Request $request)
    {
        UserAttendance::create([
            'user_id' => Auth::id(),
            'attendance_id' => $request->attendance,
            'reason_id' => $request->reason,
            'date' => $request->date
        ]);

        return redirect()->route('user.attendance.done');
    }

    public function user_done()
    {
        return view('attendance_done');
    }
}
