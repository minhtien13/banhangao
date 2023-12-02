<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index() 
    {
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
    }

    public function account()
    {
        return view('account.acc', [
            'title' => 'BASIC',
            'staturs' => 2
        ]);
    }
}