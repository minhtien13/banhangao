<div class="user__main__sildebar">
    <div class="user__main__sildebar-war">
        <ul class="user__main__sildebar-list">
            <li class="user__main__sildebar-item">
                <h3 class="user__main__sildebar__heading">
                    Trang tài khoản
                </h3>
                <span class="user__main__sildebar-name">
                   <span>Xin chào,</span>
                   {{ App\helpers\helper::getacc() }}
                </span>
            </li>
            <li class="user__main__sildebar-item"><a href="/tai-khoan">Thông tin tài khoản</a></li>
            <li class="user__main__sildebar-item"><a href="/don-hang">Đơn hàng của bạn</a></li>
            <li class="user__main__sildebar-item"><a href="/doi-mat-khau">Đổi mật khẩu</a></li>
            <li class="user__main__sildebar-item"><a href="/dia-chi">Dia chỉ của bạn</a></li>
        </ul>
    </div>
</div>
