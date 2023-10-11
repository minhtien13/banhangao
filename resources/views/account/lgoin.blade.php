@extends('main')

@section('container')
    @include('bread')

    <div class="account">
        <div class="container">
          <div class="account__top">
            <h3 class="account__top__heading">ĐĂNG KÝ TÀI KHOẢN</h3>
            <span class="account__top__txt">
              Bạn có tài khoảng chưa ?
              <a href="#" class="account__top__txt-link">
                đăng ký tại đây
              </a>
            </span>
          </div>
          <div class="account__main">
            <p class="account__main__label">thông tin cá nhân</p>
            <form action="" method="POST" class="account__main__form">
              <div class="account__main__form-war">
                <label for="" class="account__main__form-label">Gmail</label>
                <input type="email" name="email" class="account__main__form-input" placeholder="Gmail">
              </div>
              <div class="account__main__form-war">
                <label for="" class="account__main__form-label">Mật khẩu</label>
                <input type="password" name="password" class="account__main__form-input" placeholder="Mật khẩu">
              </div>
              @csrf
              <div class="account__main__form-war">
                <button class="account__main__form-btn btn">Đăng nhập</button>
              </div>
            </form>

            <div class="account__main__connect">
              <p class="account__main__connect__txt">Hoăc đăng nhập bằng</p>
              <div class="account__main__connect__war">
                <a href="" class="account__main__connect__war-link">
                  <p class="account__main__connect__war-icon">
                    <i class="fab fa-facebook-f"></i>
                  </p>
                  <span class="account__main__connect__war-text">facebook</span>
                </a>
                <a href="" class="account__main__connect__war-link">
                  <p class="account__main__connect__war-icon">
                    <i class="fab fa-google-plus-g"></i>
                  </p>
                  <span class="account__main__connect__war-text">Google</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection