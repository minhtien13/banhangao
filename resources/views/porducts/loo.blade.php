<section class="product">
    <div class="container">
    
      @include('bar')

      <ul class="product-list" id="product_item_add">
        
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
                <i class="fas fa-sliders-h"></i>
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

      @if ($staturs == 0)        
        <div class="product__bottom">
          <a href="/san-pham.html" class="btb product__bottom-link"
            >Xem tất cả <i class="fa-solid fa-chevron-right"></i>
          </a>
        </div>
      @endif
    </div>
  </section>