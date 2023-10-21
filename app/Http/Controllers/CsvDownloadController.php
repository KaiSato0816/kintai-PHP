<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Time;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvDownloadController extends Controller
{
    public function downloadCsv()
    {
        //$users = User::select('name', 'email')->get();
        //$times = Time::select('start_at', 'end_at')->get();


        $attendanceInfomation = User::join('times', 'users.id', '=', 'times.user_id')
            ->select( 'users.name','users.email', 'times.start_at', 'times.end_at' )
            ->get();


        $csvHeader = ['name', 'E-mail', 'Start_time', 'end_time'];
        //$Attendanceinfomation = $users->merge($times);
        $csvData = $attendanceInfomation->toArray();
        
        // 済　ここの部分でuserテーブルのデータを配列にすべて格納している。
        // 済　→ここで先ずは必要なデータだけを格納できるようにする。
        // 済　→Timeテーブルのデータの中の必要なデータも一緒に取ってくる
        // 済　→UserとTimeテーブルのデータで必要なデータだけを配列に格納する。
        // 済　→表示する。
        
        //



        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);

        return $response;
    }
}