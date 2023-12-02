<?php

namespace App\Http\Services\soclai;

use App\Models\soclai;
use Illuminate\Support\Facades\Session;

class soclaiService 
{
    public function insert($request)
    {
       try {
        soclai::create($request->all());
        Session::flash('success', 'Bạn đã tạo 1 liên kết thành công');
        } catch (\Exception $err) {
           Session::flash('error', 'Tạo liên kết không thành công');
           return false;
       }
    }

    public function get()
    {
        return soclai::orderByDesc('id')->get();
    }

    public function update($request, $soclai)
    {
        try {
            $soclai->fill($request->input());
            $soclai->save();
            return  Session::flash('success', 'Bạn đã cập nhật 1 liên kết thành công');
        } catch(\Exception $err) {
            Session::flash('error', 'Cập nhật liên kết không thành công');
            return false;
        }
    }

    public function remove($request)
    {
        $id = (int)$request->input('id');
        $resuit = soclai::where('id', $id)->first();
        if ($resuit) {
            return soclai::where('id', $id)->delete();
        }

        return false;
    }
}