<?php

namespace App\Http\Controllers\Admin\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Form\formRquest;
use App\Models\c;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            return redirect()->route('admin');
        }
        
        return view('admin.form.login', [
            'title' => 'Đăng nhập'
        ]);
    }
    
    public function login (formRquest $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            return redirect()->route('admin');
        }

        Session::flash('error', 'email hoặc password không dúng');
        return redirect()->back();
    }
}