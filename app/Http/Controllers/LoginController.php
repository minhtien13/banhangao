<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session ;

class LoginController extends Controller
{
    public function index() 
    {
        if (Auth::user()) {
            if (Auth::check() || Auth::user()->level == 1 || Auth::user()->level == 2) {
                return redirect()->route('login');
            }
        }

        if (isset($_COOKIE['email'])) {
            return redirect()->route('account');
        }

        return view('account.lgoin', [
            'title' => 'đăng nhập',
            'staturs' => 2
        ]); 
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $acc = User::where('email', $email)->first();

        if (password_verify($password, $acc->password) == false) {
        Session::flash('success', 'email hoặc password không dúng');
        return redirect()->back();
        }  

        if ($acc->level == 1 || $acc->level == 2) {
            return redirect()->route('login');
        }

        setcookie('email', $email, time() + 3600, '/');
        return redirect()->route('account');

    }

    public function logout()
    {
        setcookie('email', '', time() - 3600, '/');
        return redirect()->route('account');
    }
}