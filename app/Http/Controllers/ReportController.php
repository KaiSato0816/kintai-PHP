<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
    public function create()
    {
        return view('report');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
        ]);

        Report::create($data);

        return redirect('/report')->with('success', '日報が登録されました。');
    }
}

?>