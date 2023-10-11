<?php

namespace App\Http\Controllers;

use App\Http\Services\intro\introService;
use App\Http\Services\menu\MenuService;
use App\Http\Services\product\productService;
use App\Models\product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $productService;
    protected $menuService;
    protected $introService;

    public function __construct(productService $productService)
    {
        $this->productService = $productService;
        $this->menuService = new MenuService;
        $this->introService = new introService;
    }
    
    public function index(Request $request)
    {
        $title = $request->input('search');
        return view('porducts.product', [
            'title' => 'Trang chủ',
            'product' => $this->productService->getShow($title),
            'staturs' => 0,
            'menuHome' => $this->menuService->getHome()
        ]);
    }
    
    public function detall($slug)
    {
        $detall = $this->productService->getDetall(0, $slug);
        return view('porducts.detall', [
            'title' => 'Trang chủ',
            'detall' => $detall,
            'staturs' => 2,
            'product' => $this->productService->getListDetall($detall->menu_id, $detall->id)
        ]);
    }

    public function intro() 
    {
        return view('blogs.intro', [
            'title' => 'giới thiệu',
            'staturs' => 2,
            'intro' => $this->introService->show()
        ]);
    }

    public function search()
    {
        $resuit = $this->productService->search();
        return response()->json(['error' => false, 'data' => $resuit]);
    }
}