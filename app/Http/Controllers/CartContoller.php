<?php

namespace App\Http\Controllers;

use App\helpers\helper;
use App\Http\Services\cart\CartService;
use App\Models\curtomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartContoller extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addCart(Request $request)
    {
        $resuit = $this->cartService->add($request);

        if ($resuit) {
            return response()->json(['error' => false, 'message' => 'thêm vào giỏ thành công']);
        }
        
        return response()->json(['error' => true, 'message' => 'thêm vào giỏ thất bại']);
    }
   
    public function cartUpdateQty(Request $request)
    {       
        $resuit = $this->cartService->cartUpdateQty($request);

        if ($resuit) {
            return response()->json(['error' => false, 'data' => $resuit]);
        }
        
        return response()->json(['error' => true, 'message' => 'thêm vào giỏ thất bại']);
    }
       
    public function index()
    {
        $resuit = $this->cartService->getProduct();
        return view('carts.cart', [
            'title' => 'trang giỏ hàng',
            'cart' =>  Session::get('carts'),
            'data' => $resuit
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);

        return response()->json(['error' => false, 'message' => 'xóa sản phẩm thành công']);
    }

    public function checkout()
    {
        $carts = Session::get('carts');
        if (!isset($carts) || count($carts) == 0) {
            return redirect('/');
        }

        return view('carts.checkout', [
            'title' => 'trang đặt hàng',
            'cart' =>  Session::get('carts'),
        ]); 
    }

    public function store(Request $request)
    {
        $resuit = $this->cartService->insertCartCurtoner($request);

        if ($resuit) {
            return redirect('/gio-hang.html');
        }
        return redirect('/gio-hang.html');
    }

    public function countQty(Request $request)
    {
        $number = helper::countCart();
        return response()->json(['error' => false, 'qty' => $number]);
    }

    public function itemCart(Request $request)
    {
        $data = helper::autoLoadCart();
        return response()->json(['error' => false, 'data' => $data]);
    }
}