@extends('main')
@section('container')
    @include('bread')

    <div class="user__main">
       <div class="container user__main__container">
          
            @include('account.sildebar')

            <div class="user__main__home">
                <h3 class="user__main__home__heading">dịa chỉ của bạn</h3>

                <div class="user__main__home__info">
                   
                </div>
            </div>
        </div>
    </div>
@endsection