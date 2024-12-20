@extends('main')

@section('container')
    @include('bread')

    <div class="detall">
        <div class="container">
          <div class="detall__container">
            <div class="detall__container__wrapper">
              <div class="detall__container__slider__left">
                <ul class="detall__container__slider__left__list">
                  <li class="detall__container__slider__left__list-item detall__container__slider__left__list-item--active"
                       onclick="productSlider('{{ $detall->thumb }}', 0)">
                    <a class="detall__container__slider__left__list-link" href="javascript:void(0)">
                      <img src="{{ $detall->thumb }}" alt="" class="detall__container__slider__left__list-image">
                    </a>
                  </li>

                   @foreach ($sliders as $key => $slider)
                    <li class="detall__container__slider__left__list-item"
                          onclick="productSlider('{{ $slider->thumb }}', {{ $key + 1 }})">
                        <a class="detall__container__slider__left__list-link" href="javascript:void(0)">
                        <img src="{{ $slider->thumb }}" alt="" class="detall__container__slider__left__list-image">
                        </a>
                    </li>
                   @endforeach
                </ul>
              </div>
              <div class="detall__container__ima" id="detail__img__id">
                <img src="{{ $detall->thumb }}" alt="shopbasic" class="detall__container__ima-image">
              </div>
            </div>
            <div class="detall__container__wrapper">
              <h1 class="detall__container__title">{{ $detall->title }}</h1>
              <div class="detall__container__bar">
                <p class="detall__container__bar-name">
                  Thương hiệu:
                  <span class="detall__container__bar-txt">
                    BASIC
                    <span class="detall__container__bar-txt--icon product__bar-heading-icon">
                      R
                    </span>
                  </span>
                </p>
                <p class="detall__container__bar-name">
                  Mã sản phẩm:
                  <span class="detall__container__bar-txt"> {{ $detall->product_code }} </span>
                </p>
              </div>

              {!! App\helpers\helper::headPrice($detall->price, $detall->price_sale, 'detall__container__price') !!}

              <div class="detall__container__coupon">
                <h3 class="detall__container__heading">Mã giảm giá</h3>

                <ul class="detall__container__coupon__list">
                  <li class="detall__container__coupon__list-item">
                    <span class="detall__container__coupon__list-txt">
                      Giảm giá 50%
                    </span>
                  </li>
                  <li class="detall__container__coupon__list-item">
                    <span class="detall__container__coupon__list-txt">
                      Giảm giá 15%
                    </span>
                  </li>
                  <li class="detall__container__coupon__list-item">
                    <span class="detall__container__coupon__list-txt">
                      Giảm giá 15%
                    </span>
                  </li>
                  <li class="detall__container__coupon__list-item">
                    <span class="detall__container__coupon__list-txt detall__container__coupon__list-txt--btn">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                  </li>
                </ul>
              </div>
              <div class="detall__container__size">
                <div class="detall__container__size-top">
                  <h3 class="detall__container__heading">Kích thước</h3>
                  <a href="" class="detall__container__size-top-link">
                    Hướng dẫn chọn size
                  </a>
                </div>
                <ul class="detall__container__size__list">
                  <li class="detall__container__size__list-item">s</li>
                  <li class="detall__container__size__list-item">m</li>
                  <li class="detall__container__size__list-item">l</li>
                  <li class="detall__container__size__list-item">xl</li>
                </ul>
              </div>
              <div class="detall__container__type">
                <h3 class="detall__container__heading">Màu sắc</h3>
                <span class="detall__container__type-color product-list__color" style="--product-color: {{ $detall->product_color }}"></span>
              </div>

              @if ($detall->price != 0 || $detall->price_sale != 0)
              <div class="detall__container__add">
                <div class="detall__container__add__qty">
                  <button class="detall__container__add__qty-btn btn minu">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input type="number" value="1" class="detall__container__add__qty-number" id="qty">
                  <button class="detall__container__add__qty-btn btn plug">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <input type="text" class="oh" id="cart_product_id" value="{{ $detall->id }}">
                <button class="btn detall__container__add__btn" onClick="addCart()">
                  THÊM VÀO GIỞ HÀNG
                </button>
              </div>
              <div class="detall__container__bottom">
                <button class="btn detall__container__cart"onClick="addCart(1)"">MUA NGAY</button>
                <div class="detall__container__cart__message">
                  Gọi đặt mua <span>0383300680</span> (8:30 - 20:00)
                </div>
              </div>
              <div class="detall__container__media">
                <img src="/template/images/gh.jpg" alt="" class="detall__container__media-image">
                <span class="detall__container__media-txt">
                  Giao hàng toàn quốc
                </span>
              </div>
              @endif

            </div>
          </div>
          <div class="detall__container moh">
            <div class="detall__container__share__main detall__container__wrapper">
              <div class="detall__container__share">
                <p class="detall__container__share__lable">Chia sẽ</p>
                <ul class="detall__container__share__list">
                  <li class="detall__container__share__list-item">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ 'http://shop-24-7.test' . $detall->slug_url }}" target="_blank" style="--scial-icon-bg: #4267b2" class="detall__container__share__list-link">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="detall__container__share__list-item">
                    <a href="" style="--scial-icon-bg: #af30c3" class="detall__container__share__list-link">
                      <i class="fab fa-facebook-messenger"></i>
                    </a>
                  </li>
                  <li class="detall__container__share__list-item">
                    <a href="" style="--scial-icon-bg: #1da1f2" class="detall__container__share__list-link">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="detall__content">
            <div class="detall__content__bar">
              <h4 class="detall__content__bar-heading">Mô tả sản phẩm</h4>
            </div>
            <div class="detall__content__text">
                @if ($detall->content != '')
                      {!! $detall->content !!}
                @endif

                @if ($detall->content == '')
                    <p style="text-align: center">Đang cập nhật... </p>
                @endif
            </div>
          </div>

          <div class="detall__product">
            <div class="product__bar product__bar--space-between product__bar--flex">
              <h2 class="product__bar-heading product__bar-heading--500">
                SẢN PHẨM LIÊN QUÂNG
              </h2>
            </div>

                @include('porducts.loo')

          </div>
        </div>
      </div>

@endsection
