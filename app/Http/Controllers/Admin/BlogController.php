<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\c;
use App\Http\Services\blog\blogService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blog;
    public function __construct(blogService $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.list', [
            'title' => 'Danh sách blog',
            'blogs' => $this->blog->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.add', [
            'title' => 'Tạo blog'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumb' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tên blog',
            'thumb.required' => 'Vui lòng đăng ảnh blog'
        ]);

        $this->blog->insert($request);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'title' => 'Cập nhật blog: ' . $blog->title,
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'thumb' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tên blog',
            'thumb.required' => 'Vui lòng đăng ảnh blog'
        ]);

       $result = $this->blog->update($blog, $request);
       return $result ?  redirect()->back() : redirect('/admin/blog/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $blog = $this->blog->remove($request);

        return $blog ? response()->json(['error' => false, 'message' => 'Đã xóa blog thành công'], 200)
                     : response()->json(['error' => true, 'message' => 'Xóa blog không thành công'], 500);
    }
}