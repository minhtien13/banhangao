<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\cart\CartService;
use App\Models\curtomer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;    
    }

    public function index()
    {
        return view('admin.carts.curtomer', [
            'title' => 'Danh sách đơn hàng',
            'data' => $this->cartService->curtomer()
        ]);
    }

    public function cart(curtomer $id) 
    {
        return view('admin.carts.order', [
            'title' => 'Chi tiết đơn hàng',
            'data' => $this->cartService->getCart($id),
            'curtomer' => $id
        ]);
    }

    public function destroy(Request $request)
    {
        $resuit = $this->cartService->destroy($request);
        if ($resuit) {
            return response()->json(['error' => false, 'message' => 'Xóa đơn hàng thành công']);
        }
        return response()->json(['error' => true, 'message' => 'Xóa đơn hàng không thành công']);
    }
}