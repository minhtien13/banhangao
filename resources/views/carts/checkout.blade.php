@extends('main')

@section('container')
<div class="checkout">
    <section class="container">
      <div class="checkout__main">
        <h2 class="checkout__main-heading">thông tin của bạn!</h2>
        <form method="post" action="/cart/store" class="checkout__main__form">
          <div class="checkout__main__form__row">
            <label for="" class="checkout__main__form-label"
              >Tên người nhận</label
            >
            <input type="text" name="name" class="checkout__main__form-input" />
          </div>
          <div class="checkout__main__form__row">
            <label for="" class="checkout__main__form-label"
              >Số điện thoại</label
            >
            <input type="text" name="phone" class="checkout__main__form-input" />
          </div>
          <div class="checkout__main__form__row">
            <label for="" class="checkout__main__form-label">gmail</label>
            <input type="text" name="email" class="checkout__main__form-input" />
          </div>
          <div class="checkout__main__form__row">
            <label for="" class="checkout__main__form-label">Dịa chỉ</label>
            <input type="text" name="address" class="checkout__main__form-input" />
          </div>
          <div class="checkout__main__form__row">
            <button type="submit" class="btn checkout__main__form-btn">DẶT HÀNG</button>
          </div>

          @csrf
        </form>
      </div>
    </section>
  </div>
@endsection