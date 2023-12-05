<?php

namespace App\Http\Controllers;

use App\Http\Services\post\postService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(postService $postService)
    {
        $this->postService = $postService;
    }
    
    public function index()
    {
        return view('blogs.post', [
            'title' => 'SHOPBASIC - trang tin tức',
            'post' => $this->postService->show()
        ]);
    }
}