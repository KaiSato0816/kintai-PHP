<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{   
    public function index()
    {
        $users = User::all(); // ユーザーデータを取得
        return view('users', ['users' => $users]); // ビューにデータを渡す
    }
}