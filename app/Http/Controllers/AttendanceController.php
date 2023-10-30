<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function recordAttendance(Request $request)
    {
        $userId = Auth::id();
        $newest_record = Time::where('user_id', $userId)
                            ->where('end_at', null)
                            ->orderBy('created_at', 'desc')
                            ->first();

        if ($newest_record !== null) {
            return view('dashboard')->with('error', '出勤済みです。');
        }

        $attendanceReason = $request->input('attendance_reason');
        var_dump($attendanceReason);
        Time::create([
            'user_id' => $userId,
            'start_at' => now(),
            'reason' => $attendanceReason,
        ]);
        return view('dashboard')->with('success', '出勤登録されました。');

    }

    public function recordLeave()
    {
        $userId = Auth::id();
        $currentDateTime = now();

        $newest_record = Time::where('user_id', $userId)
                            ->where('end_at', null)
                            ->orderBy('created_at', 'desc')
                            ->first();

        if ($newest_record !== null) {
        // 退勤ボタンを押すと、セッションから出勤状態を削除       
            $newest_record->update([
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
