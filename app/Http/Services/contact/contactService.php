<?php

namespace App\Http\Services\contact;

use App\Models\contact;
use Faker\Extension\Extension;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Constraints\CountInDatabase;

class contactService
{
    public function insert($request)
    {
        try {
            $count = contact::where('is_active', 1)->select('id')->get();
            if (count($count) != 0) {
                Session::flash('error', 'Thông tin liên hệ đã tồn tại bạn không thể tạo thêm nữa');
                return false;
            }
            contact::create($request->all());
            return Session::flash('success', 'Bạn đã thêm thông tin liên hệ thành công');
            
        } catch (Extension $err)  {
            Session::flash('error', 'thêm thông tin liên hệ không thành công');
            return false;
        }
    }

    public function get()
    {
        return contact::orderByDesc('id')->get();
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $resuit  = contact::where('id', $id)->first();
        if ($resuit) {
            return contact::where('id', $id)->delete();
        }

        return false;
    }

    public function update($contact, $request)
    {
        try {
            $contact->fill($request->all());
            $contact->save();
            Session::flash('success', 'Bạn đã cập nhật thông tin liên hệ thành công');
            return true;
            
        } catch (Extension $err)  {
            Session::flash('error', 'cập nhật thông tin liên hệ không thành công');
            return false;
        }
    }

    public function show()
    {
        return contact::where('is_active', 1)->first();
    }
}