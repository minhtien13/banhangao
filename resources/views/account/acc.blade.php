@extends('main')
@section('container')
    @include('bread')

    <div class="user__main">
       <div class="container user__main__container">
          
            @include('account.sildebar')

            <div class="user__main__home">
                <h3 class="user__main__home__heading">thông tin tài khoản</h3>

                <div class="user__main__home__info">
                    <span class="user__main__home__item">
                        <b>Họ, tên:</b>
                        {{ $account->name }}
                    </span>

                    <span class="user__main__home__item">
                        <b>Gmail:</b>
                        {{ $account->email }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection