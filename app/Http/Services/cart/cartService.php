<?php

namespace App\Http\Services\cart;

use App\Models\c;
use App\Models\cart;
use App\Models\curtomer;
use App\Models\product;
use App\Models\User;
use Faker\Extension\Extension;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function curtomer()
    {
        return curtomer::orderByDesc('id')->paginate(50);
    }

    public function getCart($data) 
    {
        $curtomerId = $data->id;
        return cart::with('product')->where('curtomer_id', $curtomerId)->get();
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $resuit = curtomer::where('id', $id)->first();
        if($resuit) {
            cart::where('curtomer_id', $id)->delete();
            return curtomer::where('id', $id)->delete();
        }
    }

    public function add($request)
    {
        $cartId = $request->input('cart_id');
        $cartQty = $request->input('cart_qty');

        $productCart = product::where('id', $cartId)->select('price', 'price_sale')->first();

        if ($productCart->price == 0 && $productCart->price_sale == 0) {
            return false;
        }

        if ($cartId == 0 && $cartQty == 0) {
            response()->json(['error' => true, 'message' => 'số lượng hoặc mã sản phẩm']);
            return false;
        }

        $carts = Session::get('carts');

        if (is_null($carts)) {
            Session::put('carts', [
                $cartId => $cartQty
            ]);

            return true;
        }

        $exists = Arr::exists($carts, $cartId);

        if ($exists) {
            $carts[$cartId] = $carts[$cartId] + $cartQty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$cartId] = $cartQty;
        Session::put('carts', $carts);
        return true;
    }

    public function totalPrice($cartId = 0, $cartQty = 0)
    {
        $products = $this->getProduct();
        $carts = Session::get('carts');
        $total = 0;
        foreach ($products as $product) {
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $total += $price * $carts[$product->id]; 
        }

        $productFirst = product::select('price', 'price_sale')->where('is_active', 1)->where('id', $cartId)->first();
        $priceFirst = $productFirst->price_sale != 0 ? $productFirst->price_sale : $productFirst->price;
        $priceTotal = $priceFirst  * $cartQty;


        return [
            'total' => number_format($total),
            'price_total' => number_format($priceTotal),
            'qty' => $cartQty
        ];

    }

    public function cartUpdateQty($request) 
    {
        $cartId = $request->input('cart_id');
        $cartQty = (int)$request->input('cart_qty');
        $cartQty =  $cartQty != 0 ?  $cartQty : 1;
        
        $carts = Session::get('carts');
        if (isset($carts[$cartId])) {
            $carts[$cartId] =  $cartQty;
            Session::put('carts', $carts);
            $price_total = $this->totalPrice($cartId, $carts[$cartId]);
            return $price_total;
        }
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)) return [];

        $productId = array_keys($carts);
        return product::select('id', 'title', 'thumb', 'slug_url', 'price', 'price_sale', 'product_color')  
                        ->where('is_active', 1)
                        ->whereIn('id', $productId) 
                        ->get();
    }

    public function insertCartCurtoner($request)
    {
        try {
            $carts = Session::get('carts');
            $curtomer = curtomer::create($request->all());
            $this->insertCart($carts, $curtomer->id);
            
            Session::forget('carts');
            Session::flash('success', 'Bạn đã đặt hàng thành công');
        } catch (Extension $err) {
            Session::flash('success', 'Đặt hàng không thành công');
        }
    }

    public function insertCart($data, $curtomerId) {
      
        $userId = 0;
        if (isset($_COOKIE['email'])) {
            $user = User::where('email', $_COOKIE['email'])->select('id')->first();
            $userId = $user->id;
        }

        $productId = array_keys($data);
        $product =  product::select('id', 'title', 'thumb', 'price', 'price_sale')  
        ->where('is_active', 1)
        ->whereIn('id', $productId) 
        ->get();

        $cart = [];
        foreach ($product as $value) {
            $cart[] = [
                'curtomer_id' => $curtomerId,
                'product_id' => $value['id'],
                'price' => $value['price_sale'] != 0 ? $value['price_sale'] : $value['price'],
                'qty' => $data[$value['id']],
                'user_id' => $userId
            ];

        }

        return cart::insert($cart);
    }
}