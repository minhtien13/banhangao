<?php

namespace App\Http\Controllers;

use App\Http\Services\contact\contactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;
    
    public function __construct(contactService $contactService)
    {
        $this->contactService = $contactService;
    }
    
    public function index()
    {
        return view('blogs.contact', [
            'title' => 'SHOPBASIC - trang liên hệ',
            'staturs' => 1,
            'data' => $this->contactService->show()
        ]);
    }
}