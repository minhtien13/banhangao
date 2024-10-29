<?php

namespace App\view\composers;

use App\Http\Services\product\productService;
use Illuminate\View\View;

class ProductComposer
{
    protected $product;
    public function __construct(productService $product)
    {
        $this->product = $product;
    }

    public function compose(View $view)
    {
       $product = $this->product->showProductToPageBlog();
       $view->with('products', $product);
    }
}