<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function recordAttendance()
    {
        $userId = Auth::id();
        $currentDateTime = now();

        $newest_record = Time::where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->first();

        if (!$newest_record || $newest_record->end_at !== null) {
            Time::create([
                'user_id' => $userId,
                'start_at' => $currentDateTime,
                'attendance_status' => 1
            ]);
            return view('dashboard')->with('success', '出勤登録されました。');
        }

        if ($newest_record->end_at === null) {
            return view('dashboard')->with('error', '出勤済みです。');
        }
    }
        
        // 出勤ボタンを押すと、セッションに出勤状態を設定
        //↑代わりにDBのコードを書く
        // その後の処理を追加
        // ...


    public function recordLeave()
    {
        $userId = Auth::id();
        $currentDateTime = now();

        $newest_record = Time::where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->first();

        if ($newest_record && $newest_record->end_at === null) {
        // 退勤ボタンを押すと、セッションから出勤状態を削除       
        Time::where([ 
            'user_id' => $userId,
            'attendance_status' => 1
        ])->orderBy(
            'start_at', 'desc'
        )->limit(1)->update([
            'end_at' => $currentDateTime,
            'attendance_status' => 0
        ]);
        // その後の処理を追加
        // ...

        return view('dashboard')->with('success', '退勤登録されました。');
    }else{
        return view('dashboard')->with('error', '退勤済みです。');
    }
    }
}
