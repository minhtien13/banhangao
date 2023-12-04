<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function account()
    {
        if (!isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }
        
        $email = $_COOKIE['email'];
        $user = User::where('email', $email)->first();
        
        return view('account.acc', [
            'title' => 'Trang tài khoản',
            'staturs' => 2,
            'account' => $user
        ]);
    }

    public function order()
    {
        if (!isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }

        return view('account.order', [
            'title' => 'Trang đơn hàng',
            'staturs' => 2
        ]);
    }

    public function chang()
    {
        if (!isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }

        return view('account.order', [
            'title' => 'Trang đổi mật khẩu',
            'staturs' => 2
        ]);
    }

    public function address()
    {
        if (!isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }
    }
}