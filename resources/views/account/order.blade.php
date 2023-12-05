@extends('main')
@section('container')
    @include('bread')

    <div class="user__main">
        <div class="container user__main__container">
            @include('account.sildebar')

            <div class="user__main__home">
                <h3 class="user__main__home__heading">đơn hàng của bạn</h3>

                <div class="user__main__home__order">
                    <table>
                        <thead>
                            <tr>
                                <th>Đơn hàng</th>
                                <th>Ngày</th>
                                <th>Giá trị đơn hàng</th>
                                <th>Dịa chỉ</th>
                                <th>TT thanh toán</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection