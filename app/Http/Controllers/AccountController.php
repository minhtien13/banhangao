<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'title' => 'trang tài khoản - SHOPBASIC',
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

    public function pass()
    {
        if (!isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }

        return view('account.password', [
            'title' => 'Trang đổi mật khẩu',
            'staturs' => 2
        ]);
    }

    public function chang(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmed' => 'required',
            'password_new' => 'required|min:6',
        ], [
            'password.required' => 'Nhập mật khẩu',
            'password_new.required' => 'Nhập mật khẩu mới',
            'password_confirmed.required' => 'Nhập xác mật khẩu mới',
        ]);

        if (!isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }

        $email = $_COOKIE['email'];
        $user = User::where('email', $email)->first();
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'staturs' => $user->staturs,
            'level' => $user->level,
        ];

        $password = $request->input('password');
        $passwordNew = $request->input('password_new');
        $passwordConfirmed = $request->input('password_confirmed');

        if (password_verify($password, $user->password) == false) {
            Session::flash('error', 'Mật khẩu cũ không chính xác');
            return redirect()->back();
        }

        if ($passwordNew != $passwordConfirmed) {
            Session::flash('error', 'Mật khẩu xác nhạn không chính xác');
            return redirect()->back();
        }

        $data['password'] = Hash::make($passwordNew);

        $resuit = User::find($user->id)->update($data);

        if ($resuit) {
            Session::flash('success', 'Bạn đã đổi mật khẩu thành công');
            return redirect()->back();
        }

        Session::flash('error', 'Đổi mật khẩu không thành công');
        return redirect()->back();
    }


    public function address()
    {
        if (!isset($_COOKIE['email'])) {
            return redirect()->route('accLogin');
        }

        return view('account.address', [
            'title' => 'Trang dịa chỉ',
            'staturs' => 2
        ]);
    }
}