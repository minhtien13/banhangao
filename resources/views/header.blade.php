<div class="overlay search__overlay oh"></div>
<div class="search oh">
  <div class="container header__main">
    <img src="/template/images/logo.jpg" alt="basic" class="logo os moh" />

    <form action="/" method="get" class="search__main header-menu">
      <input
        type="text"
        class="search__main-input"
        id="search"
        name="search"
        value=""
        placeholder="Tìm thương hiệu"

      />
      <button class="btn search__main-btn">
        <i class="fas fa-search"></i>
      </button>

      <div class="search__main__dropdown">
        <ul class="search__main__dropdown-list" id="search__main__dropdown__item">
            {{-- reder item --}}
        </ul>
      </div>
    </form>

    <div class="header-right os moh">
      <ul class="header-right__list">
        <li class="header-right__item">
          <a href="javascript:void(0)" class="header-right__link">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
        </li>
        <li class="header-right__item header__user">
          <a href="javascript:void(0)" class="header-right__link">
            <i class="fa-regular fa-user"></i>
          </a>
          <div class="header__user-war">
            <ul class="header__user-list">
                @if (!isset($_COOKIE['email']))
                    <li class="header__user-item">
                      <a href="/dang-nhap.html" class="header__user-link">Đăng nhập</a>
                    </li>
                
                    <li class="header__user-item">
                      <a href="/dang-ky.html" class="header__user-link">Đăng ký</a>
                    </li>
                 @endif


                @if (isset($_COOKIE['email']))
                    <li class="header__user-item">
                      <a href="/tai-khoan.html" class="header__user-link">Tài khoản</a>
                    </li> 

                    <li class="header__user-item">
                      <a href="/dang-xuat.logout" class="header__user-link">Đăng xuất</a>
                    </li>
                @endif

            </ul>
          </div>
        </li>
        <li class="header-right__item header__cart">
          <a href="javascript:void(0)" class="header-right__link">
            <i class="fa-sharp fa-solid fa-bag-shopping"></i>
          </a>
          <span class="header__cart-qty"> {{ App\helpers\helper::countCart() }} </span>
          <div class="header__cart__dropdown" id="header__cart__dropdown__1">
            {!! App\helpers\helper::autoLoadCart() !!}
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="main">
  <header class="header">
    <div class="header__top">
      <a href="/san-pham.html" class="header__top-link"
        >Piên bản mới - Sự thay đổi lớn của basic</a
      >
      <span class="header__top-close">
        <i class="fa-regular fa-circle-xmark"></i>
      </span>
    </div>

    <div class="container header__main">
      <label id="menu__show" class="mobile__menu-btn">
        <i class="fa-solid fa-bars"></i>
      </label>

      <img src="/template/images/logo.jpg" alt="basic" class="logo" />

      <div class="header-menu">
        @include('menu')
      </div>

      @include('menumobile')

      <div class="header-right">
        <ul class="header-right__list">
          <li class="header-right__item header-right__btn">
            <a href="javascript:void(0)" class="header-right__link">
              <i class="fa-solid fa-magnifying-glass"></i>
            </a>
          </li>
          <li class="header-right__item header__user">
            <a href="javascript:void(0)" class="header-right__link">
              <i class="fa-regular fa-user"></i>
            </a>
            <div class="header__user-war">
              <ul class="header__user-list">
                @if (!isset($_COOKIE['email']))
                    <li class="header__user-item">
                        <a href="/dang-nhap.html" class="header__user-link">Đăng nhập</a>
                    </li>
                    <li class="header__user-item">
                        <a href="/dang-ky.html" class="header__user-link">Đăng ký</a>
                    </li>
                @endif
                
                

                @if (isset($_COOKIE['email']))
                    <li class="header__user-item">
                        <a href="/tai-khoan.html" class="header__user-link">Tài khoản</a>
                    </li> 
                    <li class="header__user-item">
                        <a href="/dang-xuat.logout" class="header__user-link">Đăng xuất</a>
                    </li>
                @endif
              </ul>
            </div>
          </li>
          <li class="header-right__item header__cart">
            <a href="/gio-hang.html" class="header-right__link">
              <i class="fa-sharp fa-solid fa-bag-shopping"></i>
            </a>
            <span class="header__cart-qty"> 
              {{ App\helpers\helper::countCart() }}
             
            </span>
            <div class="header__cart__dropdown" id="header__cart__dropdown__2">     
              {!! App\helpers\helper::autoLoadCart() !!}
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
