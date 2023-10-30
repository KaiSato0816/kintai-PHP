<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Time;

class ReportController extends Controller
{
    public function create(Request $request)
    {
        $userId = Auth::id();

        $newest_record = Time::where('user_id', $userId)
                            ->where('end_at', null)
                            ->orderBy('created_at', 'desc')
                            ->first();

            $time_id = null;
            if ($newest_record !== null) {
        // 退勤ボタンを押すと、セッションから出勤状態を削除       
            $newest_record->update([
                'end_at' => now()
            ]);
            $time_id = $newest_record->id;
        }

        $time_id = $newest_record->id;

        $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        Report::create(
            [   
                'user_id' => $request->user_id,
                'time_id' => $time_id,
                'date' => $request->date,
                'title' => $request->title,
                'content' => $request->content,
            ]
        );


        return redirect('/dashboard')->with('success', '日報が登録されました。');
    }
}

?>