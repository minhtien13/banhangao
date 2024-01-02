<?php

namespace App\Http\Controllers;

use App\Http\Services\intro\introService;
use App\Http\Services\menu\menuService;
use App\Http\Services\policy\policyService;
use App\Http\Services\product\productService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $productService;
    protected $menuService;
    protected $introService;
    protected $policyService;

    public function __construct(productService $productService, menuService $menuService, policyService $policyService)
    {
        $this->productService = $productService;
        $this->menuService = $menuService;
        $this->policyService = $policyService;
        $this->introService = new introService;
    }
    
    public function index(Request $request)
    {
        $title = $request->input('search');
        $template = $title != null ? 'porducts.search' : 'porducts.product';
        
        return view($template, [
            'title' => 'SHOPBASIC io vn',
            'product' => $this->productService->getShow($title),
            'staturs' => 0,
            'menuHome' => $this->menuService->getHome()
        ]);
    }
    
    public function detall($slug)
    {
        $detall = $this->productService->getDetall(0, $slug);
        return view('porducts.detall', [
            'title' => 'SHOPBASIC - ' . $detall->title,
            'detall' => $detall,
            'staturs' => 3,
            'product' => $this->productService->getListDetall($detall->menu_id, $detall->id)
        ]);
    }

    public function intro() 
    {
        return view('blogs.intro', [
            'title' => 'giới thiệu - SHOPBASIC',
            'staturs' => 2,
            'intro' => $this->introService->show()
        ]);
    }

    public function search()
    {
        $resuit = $this->productService->search();
        return response()->json(['error' => false, 'data' => $resuit]);
    }

    public function categry($slug)
    { 
        $resuit = $this->policyService->content($slug);
        return view('blogs.cage', [
            'title' => 'shop basic - ' . $resuit['title'],
            'staturs' => 2,
            'data' => $resuit
        ]);
    }

    public function loadMenuFirst(Request $request) 
    {
        $id = $request->input('id');
        $menuId = $request->input('menu_id');
        $resuit = $this->menuService->GetMenuFirstHome($id, $menuId);

        return response()->json(['error' => false, 'data' => $resuit]);
    }
}