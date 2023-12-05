@extends('main')
@section('container')
    @include('bread')

    <div class="user__main">
       <div class="container user__main__container">
          
            @include('account.sildebar')

            <div class="user__main__home">
                <h3 class="user__main__home__heading">đổi mật khẩu tài khoản</h3>

          
            </div>
        </div>
    </div>
@endsection