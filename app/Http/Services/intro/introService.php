<?php

namespace App\Http\Services\intro;

use App\Models\intro;
use Faker\Extension\Extension;
use Illuminate\Support\Facades\Session;

class introService
{
    public function insert($request)
    {
        try {
          intro::create($request->all());
          Session::flash('success', 'Bạn đã tạo trang giới thiệu thành công');
          return true;
        } catch (Extension $err) {
            Session::flash('error', 'Tạo trang giới thiệu không thành công');
            return false;
        }
    }

    public function countRow()
    {
        return intro::where('is_active', 1)->select('id')->get();
    }

    public function get()
    {
        return intro::orderByDesc('id')->get();
    }

    public function update($intro, $request)
    {
        try {
            $intro->fill($request->all());
            $intro->save();
            Session::flash('success', 'Bạn đã cập nhật trang giới thiệu thành công');
            return true;
        } catch (Extension $err) {
            Session::flash('error', 'cập nhật trang giới thiệu không thành công');
            return false;
        }
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $resuit = intro::where('id', $id)->first();
        if ($resuit) {
           return intro::where('id', $id)->delete();
        }
        
        return false;
    }

    public function show()
    {
        return intro::where('is_active', 1)->select('title', 'content')->first();
    }
}