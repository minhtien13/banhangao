<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\product\productSliderService;
use App\Http\Services\product\productService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductSliderController extends Controller
{
    protected $productService = '';
    protected $sliderService = '';
    public function __construct(productService $product, productSliderService $slider)
    {
        $this->productService = $product;
        $this->sliderService = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        if ($id == 0) {
            return redirect('/admin/product/list');
        }

        $checkProduct = $this->productService->isCheckProduct($id);
        if (!$checkProduct) return redirect('/admin/product/list');

        $sliders = $this->sliderService->getSlider($id);
        if (!count($sliders)) return redirect('/admin/product/slider/add/' . $id);

        return view('admin.products.sliders.list', [
            'title' => 'Danh sách ảnh phụ sản phẩm: ' . $checkProduct->title,
            'product_id' => $checkProduct->id,
            'sliders' => $sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        if ($id == 0) {
            return redirect('/admin/product/list');
        }

        $checkProduct = $this->productService->isCheckProduct($id);
        if (!$checkProduct) return redirect('/admin/product/list');

        return view('admin.products.sliders.add', [
            'title' => 'Thêm ảnh phụ sản phẩm: ' . $checkProduct->title,
            'product_id' => $checkProduct->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'thumb' => 'required'
        ], [
            'thumb.required' => 'Vui lòng tải ảnh phụ lên'
        ]);

        $slider = $this->sliderService->insert($request, $id);
        if ($slider) {
            Session::flash('success', 'Đã thêm ảnh phụ sản phâm thành công');
            return redirect()->back();
        }

        Session::flash('error', 'Thêm ảnh phụ sản phâm không thành công');
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slider = $this->sliderService->destroy($request);
        if ($slider) {
            return response()->json(['error' => false, 'message' => 'Đã xóa ảnh phụ thành công']);
        }
        return response()->json(['error' => true, 'message' => 'Xóa ảnh phụ không thành công']);
    }
}