<?php

namespace App\Http\Services\account;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class accountService
{
    public function get()
    {
        return User::orderByDesc('id')->get();
    }

    public function destroy($id)
    {
        $resuit = User::where('id', $id)->first();

        if ($resuit) {
            return User::where('id', $id)->delete();
        }

        return false;
    }

    public function update( $request, $user)
    {
        $data = [
            'name' => $request->input('name'),
            'staturs' => $request->input('staturs'),
            'level' => $request->input('level'),
            'email' => $user['email'],
            'password' => $user['password'],
        ];

        try {
            $user->fill($data);
            $user->save();
            Session::flash('success', 'Đã cập nhật tài khoản thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', 'cập nhật tài khoản không thành công');
            return false;
        }
    }

    public function chang($request, $user)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $user['level'],
            'email' => $user['email'],
            'password' => $user['password'],
            'staturs' => $user['staturs'],
        ];

        try {
            $user->fill($data);
            $user->save();
            Session::flash('success', 'Đã thay đổi thông tin tài khoản thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', 'thay đổi thông tin tài khoản không thành công');
            return false;
        }
    }

    public function changPassword($request, $user)
    {
        $data = [
            'password' => Hash::make($request->input('password')),
            'email' => $user->email,
            'level' => $user->level,
            'email' => $user->email,
            'name' => $user->name,
            'staturs' => $user->staturs,
        ];

        try {
            $user->fill($data);
            $user->save();
            Session::flash('success', 'Đã thay đổi mật khẩu thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', 'thay đổi mật khẩu không thành công');
            return false;
        }
    }
}