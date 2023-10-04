<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $userName = Auth::user();
        $acc = User::select('staturs')->where('email', $userName->email)->first();
        if ($acc->staturs != 1) {
            Session::flash('error', 'Tài khoản của bạn đã bị khóa');
            Auth::logout();
            return redirect()->route('login');
        }

        return view('admin.home.main', [
            'title' => 'admin'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}