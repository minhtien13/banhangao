@extends('main')
@section('container')   

    @include('alert')
    @include('bread')

    <div class="user__main">
       <div class="container user__main__container">
          
            @include('account.sildebar')

            <div class="user__main__home">
                <h3 class="user__main__home__heading">đổi mật khẩu tài khoản</h3>
                <p class="user__main__home__txt">
                    Để đảm bảo mật khẩu bảo mật khi đổi phải từ 6 ký tự 
                </p>

                <div class="user__main__home__pass">
                    <div class="user__main__home__pass-war">
                        <form action="/user/acc/change" method="POST" class="account__main__form">
                            <div class="account__main__form-war">
                                <label for="" class="account__main__form-label  
                                        @if ($errors->get('password')) danger @endif">Mật khẩu cũ <span class="danger">*</span>
                                </label>

                                <input type="password" name="password" class="account__main__form-input" placeholder="Mật khẩu">
                
                                @if ($errors->get('password'))
                                    <p class="account__main__form-error">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="account__main__form-war">
                                <label for="" class="account__main__form-label 
                                        @if ($errors->get('password_new')) danger @endif">Mật khẩu mới <span class="danger">*</span>
                                </label>

                                <input type="password" name="password_new" class="account__main__form-input" placeholder="Mật khẩu mới">
                
                                @if ($errors->get('password_new'))
                                    <p class="account__main__form-error">{{ $errors->first('password_new') }}</p>
                                @endif
                            </div>

                            <div class="account__main__form-war">
                                <label for="" class="account__main__form-label
                                    @if ($errors->get('password_confirmed')) danger @endif ">Xác mật khẩu mới <span class="danger">*</span>
                                </label>
                                <input type="password" name="password_confirmed" class="account__main__form-input" placeholder="Xác mật khẩu mới">
                            
                                @if ($errors->get('password_confirmed'))
                                     <p class="account__main__form-error">{{ $errors->first('password_confirmed') }}</p>
                                @endif
                            </div>

                            @csrf

                            <div class="account__main__form-war">
                            <button class="user__main__home__pass-btn account__main__form-btn btn">Đổi mật khẩu mới</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection