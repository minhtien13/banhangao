<?php

namespace App\Http\Services\blog;

use App\Models\Blog;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class blogService
{
    public function get()
    {
        try {
            return Blog::get();
        } catch (Exception $error) {
            return [];
        }
    }

    public function insert($request)
    {
        try {
            $blog = Blog::create($request->all());
            if ($blog) {
                Session::flash('success', 'Đã tạo blog thành công');
                return true;
            }

            Session::flash('error', 'Tạo blog không thành công');
            return false;

        } catch (Exception $error) {
            Session::flash('error', 'Tạo blog không thành công');
            return false;
        }
    }

    public function update($blog, $request)
    {
        try {
            $blog->fill($request->all());
            $blog->save();
            Session::flash('success', 'Đã Cập nhật blog thành công');
        } catch (Exception $error) {
            Session::flash('error', 'Cập nhật blog không thành công');
            return false;
        }
    }

    public function remove($request)
    {
        try {
            $blogId = (int)$request->input('id');
            $blog = Blog::where('id', $blogId)->first();
            if ($blog) {
                $thumb = trim($blog->thumb, '/');
                File::delete($thumb);
                Blog::where('id', $blogId)->delete();
                return true;
            }
            return false;
        } catch (Exception $error) {
            return false;
        }
    }

    #Public
    public function showPublic($query = '', $page = 10)
    {
        try {
            $blog = [];
            if ($query != '') {
                $blog = Blog::where('is_status', 1)
                        ->where('title', 'LIKE', '%' . $query . '%')
                        ->select('id', 'title', 'thumb', 'description')
                        ->paginate($page);
            } else {
                $blog = Blog::where('is_status', 1)
                        ->select('id', 'title', 'thumb', 'description')
                        ->paginate($page);
            }

            return $blog;

        } catch (Exception $error) {
            return [];
        }
    }

    public function detail($id = 0)
    {
        try {
            return Blog::where('is_status', 1)
                   ->where('id', $id)
                   ->select('title', 'thumb', 'description', 'content')
                   ->first();
        } catch (Exception $error) {
            return false;
        }
    }
}