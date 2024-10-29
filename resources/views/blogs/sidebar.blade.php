<div class="blog_page__slidebar">
    <div class="blog_page__sidebar__main">
        <h4 class="blog_page__sidebar--heading">Tìm Kiểm</h4>
        <form action="" class="blog_page__search-main">
            <button class="blog_page__search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input type="text" class="blog_page__search-input" placeholder="Tìm Kiểm">
        </form>
    </div>

    <div class="blog_page__sidebar__main">
        <h4 class="blog_page__sidebar--heading">Sản phẩm</h4>
        <div class="blog_page__product">
            <ul>
                @foreach ($products as $product)
                <li>
                    <div class="blog_page__product__wrapper">
                        <div class="blog_page__product__image">
                            <img src="{{ $product->thumb }}" alt="">
                        </div>
                        <div class="blog_page__product__info">
                            <a href="/san-pham/{{ $product->slug_url }}" class="blog_page__product__info-link">
                                <h3> {{ $product->title }} </h3>
                            </a>
                            <span class="blog_page__product__info-price">
                                  @php
                                      $price = App\helpers\helper::price($product->price, $product->price_sale)
                                  @endphp

                                  @if ($price)
                                      {{ $price }} <sup>đ</sup>
                                  @else
                                      <a href="/lien-he" class="link">Liên Hệ</a>
                                  @endif
                            </span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="blog_page__sidebar__main">
        <h4 class="blog_page__sidebar--heading">Menu</h4>
        <div class="blog_page__menu">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/san-pham">Trang sản phẩm</a></li>
                <li><a href="/gioi-thieu">Trang giới thiệu</a></li>
                <li><a href="/blog">Trang blog</a></li>
                <li><a href="/tin-tuc">Trang tin tức</a></li>
                <li><a href="/lien-he">Trang liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>
