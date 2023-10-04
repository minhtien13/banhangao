<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\productRequest;
use App\Http\Services\menu\MenuService;
use App\Http\Services\product\productService;
use App\Models\c;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $MenuService;

    public function __construct(productService $productService)
    {
        $this->productService = $productService;
        $this->MenuService = new MenuService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.list', [
            'title' => 'Danh sách sản phẩm',
            'data' => $this->productService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Thêm sản phẩm',
            'data' => $this->MenuService->get()
        ]);
    }

    public function slug(Request $request)
    {
        $data = $this->productService->checkSlug($request);

        return response()->json(['error' => false, 'slug' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(product $id)
    {
        return view('admin.products.edit', [
            'title' => 'Thêm sản phẩm',
            'data' => $this->MenuService->get(),
            'product' => $id
        ]);
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $id)
    {
        $resuit = $this->productService->update($id, $request);
        if ($resuit !== false) {
            return redirect('/admin/product/list');
        }
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
        $resuit = $this->productService->remove($request);

        if ($resuit !== false) {
            return response()->json(['error' => false, 'Xóa sản phẩm thành công']);
        }
        return response()->json(['error' => true, 'Xóa sản phẩm không thành công']);
    }
}