<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;

class TimeController extends Controller
{
   // TimeController.php

public function edit($id)
{
    // $time = Time::find($id);
    // return view('admin.edit', compact('time'));
    // 例: 特定のデータを取得する方法
    $time = Time::find($id); // $id は編集したいデータのIDです
    return view('admin_edit', compact('time'));
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

