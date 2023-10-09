<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        if ($user->role === 1) {
            // Adminユーザーの場合
            return redirect()->route('admin_dashboard'); // リダイレクト先をAdmin用のダッシュボードに設定
        }else{
            // 一般ユーザーの場合
        return redirect()->route('admin_dashboard');
        }
    }
}