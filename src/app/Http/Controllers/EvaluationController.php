<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function add(Request $request, $id)
    {
        Evaluation::create([
            'evaluation' => $request['evaluation'],
            'blog_id' => $id,
            'user_id' => Auth::id()
        ]);

        return redirect()
            ->route('blog.detail',$id)
            ->withStatus("評価しました");
    }

    public function update(Request $request, $id)
    {
        $evaluation_update = Evaluation::find($id);

        $evaluation_update['evaluation'] = $request['evaluation'];
        
        $evaluation_update->save();

        return redirect()
            ->route('blog.detail',$evaluation_update['blog_id'])
            ->withStatus("変更しました");
    }
}
