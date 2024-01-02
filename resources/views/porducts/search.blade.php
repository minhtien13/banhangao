@extends('main')

@section('container')
    



<section class="product">
    <div class="container">
        
        <div class="product__bar product__bar--space-between product__bar--flex">
            <h2 class="product__bar-heading">Kết quả Tìm kiểm</h2>
        </div>

        @if (count($product) == 0)
            <h3 class="search__message">Không có sản phẩm nào hết </h3>
        @endif

      <ul class="product-list">
        
        @foreach ($product as $productItem)
          
        <li class="product-list__item">
          <div class="product-list__ima">
            <img
              src="{{ $productItem->thumb }}"
              alt="SHOPBASIC io vn"
              class="product-list__image"
            />
            <img
              src="/template/images/logo.jpg"
              alt=""
              class="product-list__logo"
            />

            <div class="product-list__active">
              <a href="/san-pham/{{ $productItem->slug_url }}.html" class="product-list__active-link">
                <i class="fas fa-water"></i>
              </a>
              <a
                href="javascript:void(0)"
                onclick="loadDetall({{ $productItem->id }})"
                class="product-list__active-link"
              >
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
          <div class="product-list__content">
            <a href="/san-pham/{{ $productItem->slug_url }}.html" class="product-list__title">
              <h1>{{ $productItem->title }}</h1>
            </a>
            
            {!! App\helpers\helper::headPrice($productItem->price, $productItem->price_sale) !!}

            <span
              class="product-list__color"
              style="--product-color: {{ $productItem->product_color }}"
            ></span>
          </div>
        </li>
        
        @endforeach

      </ul>
    </div>
</section>

  
@endsection