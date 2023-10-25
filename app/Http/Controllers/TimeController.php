<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;

class TimeController extends Controller
{
   // TimeController.php

public function edit($user_id)
{
    // $time = Time::find($id);
    // return view('admin.edit', compact('time'));
    // 例: 特定のデータを取得する方法
    //$time = Time::find($user_id); // $id は編集したいデータのIDです
    $times = Time::where('user_id', $user_id)->get();

    return view('edit', compact('times'));
}

public function update(Request $request, $id)
{
    $time = Time::find($id);
    $time->start_at = $request->input('start_at');
    $time->end_at = $request->input('end_at');
    $time->save();

    return redirect('/dashboard')->with('success', 'データが更新されました。');
}

}

