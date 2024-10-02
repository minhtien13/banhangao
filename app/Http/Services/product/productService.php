<?php

namespace App\Http\Services\product;

use App\Models\product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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

            $url = trim($resuit->thumb, '/');
            if (File::exists($url)) {
                file::delete($url);
            }

            return product::where('id', $id)->delete();
        }

        return false;
    }

    public function update($product, $request)
    {
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Đã cập nhật sản phẩm thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', 'cập nhật sản phẩm không thành công');
            return false;
        }
    }

    public function isCheckProduct($id = 0)
    {
        if ($id == 0) {
            return false;
        }

        $product = product::where('id', $id)->select('id', 'title')->first();

        return $product ? $product : false;
    }

    // PATH PUBLIC
    public function getShow($title = '' , $page = 10)
    {
        if ($title == '') {
            return product::orderByDesc('id')
                ->where('is_active', 1)
                ->select('title','slug_url', 'thumb', 'price', 'price_sale', 'id', 'product_color')
                ->paginate($page);
        }

         return product::orderByDesc('id')
                ->where('is_active', 1)
                ->where('title', 'LIKE', '%' . $title . '%')
                ->select('title','slug_url', 'thumb', 'price', 'price_sale', 'id', 'product_color')
                ->get();
    }

    public function getListMenu($menuId = 0, $id = 0) {
        return product::where('is_active', 1)->where('menu_id', $menuId)->limit(8)->orderByDesc("id")->get();
    }

    public function getDetall($id = 0, $url = '')
    {
        if ($url != '') {
            return product::where('is_active', 1)
                ->where('slug_url', $url)
                ->select('title','slug_url', 'thumb', 'price', 'menu_id', 'price_sale', 'id', 'product_color', 'product_code', 'content')
                ->first();
        }

        if ($id != 0) {
            return product::where('is_active', 1)
                ->where('id', $id)
                ->select('title','slug_url', 'thumb', 'price', 'menu_id', 'price_sale', 'id', 'product_color', 'product_code')
                ->first();
        }
    }

    public function getListDetall($menuId = 0, $id = 0)
    {
        return product::where('is_active', 1)->where('menu_id', $menuId)->where('id', '!=', $id)->limit(5)->orderByDesc("id")->get();
    }

    public function search()
    {
        return product::select('title', 'id')->where('is_active', 1)->get();
    }

    public function productSelect($num)
    {
        if ($num == 1) {
            return product::where('price_sale', 0)->orderByDesc('price')->get();
        }

        if ($num == 2) {
            return product::where('price_sale', 0)->orderBy('price', 'ASC')->get();
        }

        if ($num == 4) {
            return product::where('price_sale', '!=', 0)->orderByDesc('price_sale')->get();
        }

        if ($num == 3) {
            return product::orderByDesc('id')->get();
        }
    }
}