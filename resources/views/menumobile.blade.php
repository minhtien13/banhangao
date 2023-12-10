<div class="overlay mobile__header-overlay oh"></div>
<div class="mobile__header-menu oh">
    <div class="mobile__wrapper">
        <div class="mobile__user">
            <span class="mobile__user-icon">
                <i class="fas fa-user-circle"></i>
            </span>
            <div class="mobile__user-info">
              
                @if (!isset($_COOKIE['email']))
                    <span class="mobile__user-name"> Tài khoảng </span>
                    <a href="/dang-nhap.html" class="mobile__user-username"> Đăng nhập </a>
                @endif

                @if (isset($_COOKIE['email']))
                    <a href="/tai-khoan.html" class="mobile__user-name"> Tài khoản </a>
                    <a href="/dang-xuat.logout" class="mobile__user-username"> Đăng xuất </a>
                @endif
            </div>
        </div>

        @include('menu')
    </div>

    <div class="mobile__contact">
        <div class="mobile__contact-btn">
        <a href="" class="mobile__contact-txt">Gọi</a>
        <a href="" class="mobile__contact-icon">
            <i class="fas fa-phone-alt"></i>
        </a>
        </div>
        <div class="mobile__contact-btn">
        <a href="" class="mobile__contact-txt">Nhắn tin</a>
        <a href="" class="mobile__contact-icon">
            <i class="fab fa-facebook-messenger"></i>
        </a>
        </div>
    </div>
</div>