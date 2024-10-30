<?php

namespace App\Http\Controllers;

use App\Http\Services\blog\blogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blog;
    public function __construct(blogService $blog)
    {
        $this->blog = $blog;
    }

    public function index()
    {
        return view('blogs.blog', [
            'title' => 'Trang blog',
            'blogs' => $this->blog->showPublic(),
            'staturs' => 0
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('s');
        if (!isset($query) && $query == '') return redirect()->route('blog');

        return view('blogs.blog', [
            'title' => 'Tìm kiểm blog',
            'blogs' => $this->blog->showPublic($query),
            'staturs' => 0
        ]);
    }

    public function detail($slug, $id)
    {
        $blog = $this->blog->detail($id);
        if (!$blog) return redirect('/blog');

        return view('blogs.detail', [
            'title' => 'chi tiết bài viết blog',
            'blog' => $blog,
            'staturs' => 0
        ]);
    }
}