@extends('main')
@section('container')
    @include('bread')

    <div class="user__main">
        <div class="container user__main__container">
            <div class="user__main__sildebar">
                <div class="user__main__sildebar-war">
                    <ul class="user__main__sildebar-list">
                        <li class="user__main__sildebar-item">
                            <h3 class="user__main__sildebar__heading">
                                Trang tài khoản
                            </h3>
                            <span class="user__main__sildebar-name">
                                Đõ văn trung
                            </span>
                        </li>
                        <li class="user__main__sildebar-item"><a href="#">Thông tin tài khoản</a></li>
                        <li class="user__main__sildebar-item"><a href="#">Đơn hàng của bạn</a></li>
                        <li class="user__main__sildebar-item"><a href="#">Đổi mật khẩu</a></li>
                        <li class="user__main__sildebar-item"><a href="/user/acc/logout">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>

            <div class="user__main__home">
                homes
            </div>
        </div>
    </div>
@endsection