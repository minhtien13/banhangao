<?php

namespace App\Http\Services\policy;

use App\Models\policy;
use Illuminate\Support\Facades\Session;

class policyService
{
    public function insert($request)
    {
       $url = $request->input('link_url');
       $resuit = policy::where('link_url', $url)->first();
       if ($resuit) {
        Session::flash('error', 'chính sách này đã tồn tại');
        return false;
       }


       try {
            policy::create($request->all());
            return Session::flash('success', 'Bạn đã tạo chính sách thành công');
       } catch (\Exception $err) {
            Session::flash('error', 'tạo chính sách không thành công');
            return false;
       }
    }

    public function get()
    {
        return policy::orderByDesc('id')->get();
    }

    public function update($request, $policy)
    {
        try {
            $policy->fill($request->input());
            $policy->save();
            return  Session::flash('success', 'Bạn đã cập nhật chính sách thành công');
        } catch(\Exception $err) {
            Session::flash('error', 'Cập nhật chính sách không thành công');
            return false;
        }
    }

    public function remove($request)
    {
        $id = (int)$request->input('id');
        $resuit = policy::where('id', $id)->first();
        if ($resuit) {
            return policy::where('id', $id)->delete();
        }

        return false;
    }

    public function content($slug) 
    {
        return policy::where('link_url', $slug)->select('title', 'content')->first();
    }
}