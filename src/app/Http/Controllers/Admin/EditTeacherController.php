<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Team;
use App\Http\Requests\EditTeacherRequest;

class EditTeacherController extends Controller
{
    public function index()
    {
        $teacher_lists = Teacher::all();
        $teacher_team_lists = Team::all();
        $team_lists = Team::all();

        return view('admin.edit_teacher', compact(
            'teacher_lists',
            'teacher_team_lists',
            'team_lists'
        ));
    }

    public function update(EditTeacherRequest $request, $id)
    {
        $teacher_update = Teacher::find($id);

        $teacher_update['name'] = $request['name'];
        $teacher_update['email'] = $request['email'];
        $teacher_update['team_id'] = $request['team_id'];

        $teacher_update->save();

        return redirect()
            ->back()
            ->withStatus("更新しました");
    }

    public function delete($id)
    {
        $teacher_delete = Teacher::find($id);

        $teacher_delete->delete();

        return redirect()
            ->back()
            ->withStatus("削除しました");
    }
}
