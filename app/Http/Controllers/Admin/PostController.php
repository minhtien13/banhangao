<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\post\postRequest;
use App\Http\Services\post\postService;
use App\Models\c;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    protected $postService;

    public function __construct(postService $postService)
    {
       $this->postService = $postService; 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.list', [
            'title' => 'Danh sách giới thiệu',
            'data' => $this->postService->get()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.add', [
            'title' => 'tạo giới thiệu'
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postRequest $request)
    {
        $row = $this->postService->countRow();
        if (count($row) != 0) {
            Session::flash('error', 'bạn đã có một trang giới thiệu đã được kích hoạt');
            return redirect('/admin/post/list');
        }

        $resuit = $this->postService->insert($request);
        if ($resuit) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(post $id)
    {
        return view('admin.posts.edit', [
            'title' => 'cập nhật giới thiệu', 
            'data' => $id
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $id)
    {
        $resuit = $this->postService->update($id, $request);
        if ($resuit) {
            return redirect('/admin/post/list');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $resuit = $this->postService->destroy($request);
        if ($resuit) {
            return response()->json(['error' => false, 'message' => 'Bạn đã xóa trang giới thiệu thành công']);
        }

        return response()->json(['error' => false, 'message' => 'xóa trang giới thiệu không thành công']);
    }
}