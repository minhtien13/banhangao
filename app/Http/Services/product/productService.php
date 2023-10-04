<?php

namespace App\Http\Services\product;

use App\Models\product;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Random;

class productService
{
    public function checkSlug($request)
    {
        $slug = $request->input('url');
        $resuit = product::where('slug_url', $slug)->first();
        
        if ($resuit) {
            $slug .= '-' . rand(10, 1000000);
        }

        return $slug;
    }

    public function insert($request)
    {
        try {
            product::create($request->all());
            Session::flash('success', 'Đã thêm thành công sản phẩm mới');
        } catch (\Exception $err) {
            Session::flash('error', 'Đã thêm không thành công sản phẩm mới');
            return false;
        }
    }

    public function get()
    {
        return product::with("menu")->orderByDesc("id")->paginate(20);
    }

    public function remove($request)
    {
        $id = (int)$request->input('id');

        $resuit = product::where('id', $id)->first();

        if ($resuit) {
            return product::where('id', $id)->delete();
        }

        return false;
    }

    public function update($product, $request)
    {
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Đã cập nhật thêm sản phẩm thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', 'cập nhật thêm sản phẩm không thành công');
            return false;
        }
    }

    public function getShow($title = '' ,$page = 10)
    {
       return product::orderByDesc('id')
                ->where('is_active', 1)
                ->where('title', 'LIKE', '%' . $title . '%')
                ->select('title','slug_url', 'thumb', 'price', 'price_sale', 'id', 'product_color')
                ->paginate($page);
    }

    public function getListMenu($menuId = 0, $id = 0) {
        return product::where('is_active', 1)->where('menu_id', $menuId)->limit(8)->orderByDesc("id")->get();
    }
  
    public function getDetall($id = 0, $url = '') 
    {
        if ($url != '') {
            return product::where('is_active', 1)
                ->where('slug_url', $url)
                ->select('title','slug_url', 'thumb', 'price', 'menu_id', 'price_sale', 'id', 'product_color', 'product_code')
                ->first();
        }
       
        if ($id != 0) {
            return product::where('is_active', 1)
                ->where('id', $id)
                ->select('title','slug_url', 'thumb', 'price', 'menu_id', 'price_sale', 'id', 'product_color', 'product_code')
                ->first();
        }
    }
    
    public function getListDetall($menuId = 0, $id = 0) {
        return product::where('is_active', 1)->where('menu_id', $menuId)->where('id', '!=', $id)->limit(5)->orderByDesc("id")->get();
    }
}