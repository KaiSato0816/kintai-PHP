<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Time;
class UserController extends Controller{   
    public function index(Request $request)
    {   
        //if($request->ajax()){
            $userId = Auth::id();
            $userAttendance = Time::where([
                'user_id' => $userId,
                'delete_flag' => 0,
            ])
            ->select('start_at', 'end_at')
            ->get();    
            $formatEvents = $this->formatEventData($userAttendance);
            return response()->json($formatEvents);
        //}
       // return view('dashboard');
    }

    public function formatEventData($userAttendance) {
        $formattedEvents = [];
    
        foreach ($userAttendance as $attendance) {
                // 出勤のイベント
                $formattedEvents[] = [
                    'title' => '出勤 ' . date('H:i', strtotime($attendance->start_at)),
                    'start' => date('Y-m-d', strtotime($attendance->start_at)),
                ];
                if($attendance->end_at !== null){
                    // 退勤のイベント
                    $formattedEvents[] = [
                        'title' => '退勤 ' . date('H:i', strtotime($attendance->end_at)),
                        'start' => date('Y-m-d', strtotime($attendance->end_at)),
                    ];
                }
        }
    
        return $formattedEvents;
    }



}