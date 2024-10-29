@extends('main')

@section('container')

    @include('alert')


    <section class="container">
        <div class="cart__container">
            @if (!isset($cart) || count($cart) == 0)
                    <div class="cart__container__emty">
                    <div class="cart__container__emty__head">
                        <div class="cart__container__emty__head-heading">
                        <i class="fas fa-shipping-fast"></i>
                        freeship với đơn hàng giá trị 3.000.000
                        </div>
                    </div>
                    <div class="cart__container__emty__main">
                        <div class="cart__container__emty__main-ima">
                        <img src="/template/images/cart_empty_background.png" alt="" class="cart__container__emty__main-image">
                        </div>
                        <h4 class="cart__container__emty__main-title">
                        "Hổng" có gì trong giỏ hết
                        </h4>
                        <p class="cart__container__emty__main-desc">
                        Về trang cửa hàng để chọn mua sản phẩm bạn nhé!!
                        </p>
                        <div class="product__bottom">
                        <a href="/san-pham" class="btb product__bottom-link">
                            Mua sấm ngay
                        </a>
                        </div>
                    </div>
                    </div>
            @endif

            @if (isset($cart) && count($cart) != 0)
                    <h3 class="cart__container__order__heading">Giỏ hàng</h3>
                    <div class="cart__container__order">
                    <div class="cart__container__order__warpper">
                        <div class="cart__container__order__list">
                            @php
                                $sumAll = 0;
                            @endphp
                            @foreach ($data as $key => $row)

                                @php
                                    $price = $row->price_sale != 0 ? $row->price_sale : $row->price;
                                    $sum = $price * $cart[$row->id];
                                    $sumAll += $sum;
                                @endphp
                                <div class="cart__container__order__item cart__id__{{ $row->id }}">
                                    <a href="javascript:void(0)" onClick="deleteCart({{ $row->id }}, 1)" class="cart__container__order__close">
                                    <i class="fas fa-times"></i>
                                    </a>
                                    <img src="{{ $row->thumb }}" alt="" class="cart__container__order__image">

                                    <div class="cart__container__order__content">
                                    <div class="cart__container__order__content__left">
                                        <h4 class="cart__container__order__title">
                                            {{ $row->title }}
                                        </h4>
                                        <span class="cart__container__order__type">
                                        S / {{ $row->product_color == '' ? 'không có màu' : $row->product_color; }}
                                        </span>
                                    </div>
                                    <div class="cart__container__order__content__right">
                                        <span class="cart__container__order__price" id="order__price_{{ $row->id }}">{{ number_format($sum) }}</span>
                                        <div class="detall__container__add__qty">
                                        <button class="detall__container__add__qty-btn btn" onclick="CartUpdateQty({{ $row->id }}, 0)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" id="qty_number_id_{{ $row->id }}" readonly class="detall__container__add__qty-number" value="{{ $cart[$row->id] }}">
                                        <button class="detall__container__add__qty-btn btn" onclick="CartUpdateQty({{ $row->id }}, 1)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="cart__container__order__warpper">
                        <div class="cart__container__order__payment">
                        <div class="cart__container__order__payment__top">
                            <p class="cart__container__order__payment__top-text">
                            Tổng cộng
                            </p>
                            <span class="cart__container__order__payment__top-all" id="order__sumall">
                                {{ number_format($sumAll) }}<sub>đ</sub>
                            </span>
                        </div>
                        <div class="cart__container__order__payment__coupon">
                            <p class="cart__container__order__payment__coupon-txt">
                            Mã giảm giá
                            </p>
                            <a href="" class="cart__container__order__payment__coupon-link">
                            Lấy mã <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <a href="/dat-hang" class="cart__container__order__payment__btn btn">
                            thanh toán
                        </a>
                        <ul class="cart__container__order__payment__list">
                            <li class="cart__container__order__payment__list-item">
                            <a href="" class="cart__container__order__payment__list-link">
                                <img src="/template/images/vísa.png" alt="" class="cart__container__order__payment__list-image">
                            </a>
                            </li>
                            <li class="cart__container__order__payment__list-item">
                            <a href="" class="cart__container__order__payment__list-link">
                                <img src="/template/images/mastercard.png" alt="" class="cart__container__order__payment__list-image">
                            </a>
                            </li>
                            <li class="cart__container__order__payment__list-item">
                            <a href="" class="cart__container__order__payment__list-link">
                                <img src="/template/images/momo.png" alt="" class="cart__container__order__payment__list-image">
                            </a>
                            </li>
                            <li class="cart__container__order__payment__list-item">
                            <a href="" class="cart__container__order__payment__list-link">
                                <img src="/template/images/zalopay.png" alt="" class="cart__container__order__payment__list-image">
                            </a>
                            </li>
                            <li class="cart__container__order__payment__list-item">
                            <a href="" class="cart__container__order__payment__list-link">
                                <img src="/template/images/vanchuyen.jpg" alt="" class="cart__container__order__payment__list-image">
                            </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
            @endif
        </div>
    </section>
@endsection
