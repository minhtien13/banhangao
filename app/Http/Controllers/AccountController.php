<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form\formRquest;
use Illuminate\Support\Facades\Sessionp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index() 
    {
       return view('account.lgoin', [
        'title' => 'đăng nhập',
        'staturs' => 2
       ]); 
    }

    public function login(formRquest $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            return redirect()->route('admin');
        }
    }
}