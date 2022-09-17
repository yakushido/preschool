<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\EditAdminRequest;

class EditAdminController extends Controller
{
    public function index()
    {
        $admin_lists = Admin::all();

        return view('admin.edit_admin', compact(
            'admin_lists'
        ));
    }

    public function update(EditAdminRequest $request, $id)
    {
        $admin_update = Admin::find($id);

        $admin_update['name'] = $request['name'];
        $admin_update['email'] = $request['email'];

        $admin_update->save();

        return redirect()
            ->back()
            ->withStatus("更新しました");
    }

    public function delete($id)
    {
        $admin_delete = Admin::find($id);

        $admin_delete->delete();

        return redirect()
            ->back()
            ->withStatus("削除しました");
    }
}
