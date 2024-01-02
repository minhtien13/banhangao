
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;800&family=Roboto:wght@300;500;700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="/template/admin/form/asset/css/reset.css" />
    <link rel="stylesheet" href="/template/admin/form/asset/css/main.css" />
  </head>
  <body>
    <div class="admin">
      <div class="admin__main">
        <div class="admin__main__ima">
          <img
            src="/template/admin/form/asset/images/banner.jpg"
            alt=""
            class="admin__main__ima-image"
          />
          <span class="admin__main__ima-txt"
            >Đăng nhập vào cửa hàng của bạn</span
          >
        </div>
        @if (Session::has('error'))
           <p class="message">{{ Session::get('error') }}</p>
        @endif
        <form action="" method="POST" class="admin__main__form">
          <input type="hidden" name="remember" value="1">
          <input
            type="email"
            class="admin__main__form-input"
            placeholder="Gmail / tài khoản"
            name="email"
          />
          <input
            type="password"
            class="admin__main__form-input"
            placeholder="Mật khẩu"
            name="password"
          />
          <button class="admin__main__form-btn">đăng nhập</button>

          @csrf
        </form>
        <div class="admin__connect">
          <p class="admin__connect__txt">Hoặc đăng nhập bằng</p>
          <div class="admin__connect__container">
            <a href="" class="admin__connect__link">
              <span class="admin__connect__icon">
                <i class="fab fa-facebook-f"></i>
              </span>
              <span class="admin__connect__name">Facebook</span>
            </a>
            <a href="" class="admin__connect__link">
              <span class="admin__connect__icon">
                <i class="fab fa-google"></i>
              </span>
              <span class="admin__connect__name">Google</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="overlay__loading">
      <div class="loading"></div>
    </div>
  </body>
  <script src="/template/admin/form/asset/js/main.js"></script>
</html>
