<?php

namespace App\Http\Services\post;

use App\Models\post;
use Faker\Extension\Extension;
use Illuminate\Support\Facades\Session;

class postService
{
    public function insert($request)
    {
        try {
            post::create($request->all());
            Session::flash('success', 'Bạn đã tạo thành công trang giới thiệu ');
        } catch (Extension $err) {
            Session::flash('error', 'tạo không thành công trang giới thiệu ');
        }
    }

    public function countRow()
    {
        return post::where('is_active', 1)->select('id', 'is_active')->get();
    }
    
    public function show()
    {
        return post::where('is_active', 1)->select('title', 'thumb', 'slug_url', 'content', 'updated_at')->first();
    }
  
    public function get()
    {
        return post::orderByDesc('id')->get();
    }

    public function update($post, $request)
    {
        try {
            $post->fill($request->all());
            $post->save();
            Session::flash('success', 'Bạn đã cập nhật trang giới thiệu thành công');
            return true;
        } catch (Extension $err) {
            Session::flash('success', 'cập nhật trang giới thiệu không thành công');
            return false;
        }
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $post = post::where('id', $id)->first();

        if ($post) {
            return post::where('id', $id)->delete();
        }
        
        return false;
    }
}