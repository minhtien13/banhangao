<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('account.register', [
            'title' => 'trang đăng ký - SHOPBASIC',
            'staturs' => 2
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Đặt tên tài khoản của bạn',
            'email.required' => 'Nhập Dịa chỉ của bạn',
            'email.email' => 'Nhập Dịa chỉ sài định dạng',
            'email.unique' => 'Dịa chỉ của bạn đã tồn tại không thể đăng ký',
            'password.required' => 'Đặt Mật khẩu cho tài khoản của bạn',
            'password.min' => 'Đặt Mật khẩu cho tài khoản từ 6 ký tự trở lên',
        ]);

        $user = $request->except('password_confirmed');
        
        $user['password'] = Hash::make($user['password']);
        $user['staturs'] = 1;
        $user['level'] = 3;

        User::create($user);

        if (isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }

        setcookie('email', $user['email'], time() + 3600, '/');
        Session::flash('success', 'Bạn đã ký tài khoản thành công');
        return redirect()->route('account');

    }
}