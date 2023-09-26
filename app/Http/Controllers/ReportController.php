<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'date' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        Report::create(
            [   
                'user_id' => $request->user_id,
                'date' => $request->date,
                'title' => $request->title,
                'content' => $request->content,
            ]
        );


        return redirect('/dashboard')->with('success', '日報が登録されました。');
    }
}

?>