<?php

namespace App\Http\Services\account;

use App\Models\User;
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
}