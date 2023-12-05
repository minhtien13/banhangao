<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('account.register', [
            'title' => 'trang đăng ký - SHOPBASIC',
            'staturs' => 2
        ]);
    }

    public function store()
    {
        
    }
}