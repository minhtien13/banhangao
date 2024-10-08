<?php

namespace App\Http\Controllers;

use App\Http\Services\product\productService;
use App\Http\Services\product\productSliderService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $productSlider;

    public function __construct(productService $product, productSliderService $productSlider)
    {
        $this->product = $product;
        $this->productSlider = $productSlider;
    }

    public function product()
    {
        return view('product', [
            'title' => 'tất cả sản phẩm - SHOPBASIC',
            'product' => $this->product->getShow('', 10),
            'page' => 1,
            'staturs' => 1
        ]);
    }

    public function loadProductList(Request $request)
    {
       $id = (int)$request->input('id');
       $data = $this->product->getListMenu($id);

       if ($data) {
           return response()->json(['error' => false, 'data' => $data]);
       }
       return response()->json(['error' => true, 'messge' => 'không có dự liệu']);
    }

    public function productList($id)
    {
        return view('product', [
            'title' => 'tất cả sản phẩm',
            'product' => $this->product->getListMenu($id),
            'staturs' => 1
        ]);
    }

    public function loadDetall(Request $request)
    {
        $id = (int)$request->input('id');
        $resuit = $this->product->getDetall($id);
        $sliders = $this->productSlider->getSlider($id);

        if ($id == 0) {
            return response()->json(['error' => true, 'message' => 'không có sản phẩm này']);
        }

        if ($resuit) {
            return response()->json(['error' => false, 'success' => [
                                    'data' => $resuit,
                                    'sliders' => $sliders
                                    ]]);
        }

        return response()->json(['error' => true, 'message' => 'không có sản phẩm này']);
    }



    public function productListMenu($id = 0, $slug = '')
    {
        return view('product', [
            'title' => 'tất cả sản phẩm',
            'product' => $this->product->getListMenu($id),
            'staturs' => 1
        ]);
    }

    public function productSelect(Request $request)
    {
        $num = $request->input('num');
        $data = $this->product->productSelect($num);

        return response()->json(['error' => false, 'data' => $data]);
    }
}
