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
        
        return view('account.acc', [
            'title' => 'BASIC',
            'staturs' => 2
        ]);
    }
}