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

    public function detail($slug, $id)
    {
        return view('blogs.detail', [
            'title' => 'chi tiết bài viết blog',
            'staturs' => 0
        ]);
    }
}