<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.blog', [
            'title' => 'Trang blog',
            'staturs' => 0
        ]);
    }
}