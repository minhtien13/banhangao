<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login() 
    {
       return view('account.lgoin', [
        'title' => 'đăng nhập',
        'staturs' => 2
       ]); 
    }

    public function add()
    {
        
    }
}