<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {   
        $users = User::all(); // ユーザーデータを取得
        return view('admin_dashboard', ['users' => $users]);
    }

    public function edit($id){

        $user = User::find($id);
        return view('admin_edit', compact('user'));
    }
}