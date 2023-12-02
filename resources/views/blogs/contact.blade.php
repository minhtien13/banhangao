@extends('main')

@section('container')

    @include('bread')

    <div class="contact">
        <div class="container">
          <div class="contact__container">
            <div class="contact__container__wrapper">
              <h2 class="contact__container__heading">{{ $data->title }}</h2>
              <ul class="contact__container__list">
                <li class="contact__container__list-item">
                  <i class="fas fa-map-marker-alt"></i>
                  <b>Dịa chỉ:</b> {{ $data->address }}
                </li>
                <li class="contact__container__list-item">
                  <i class="fas fa-mobile-alt"></i>
                  <b>Liên hệ:</b> {{ $data->phone }}
                </li>
                <li class="contact__container__list-item">
                  <i class="fas fa-envelope"></i>
                  <b>Email:</b> {{ $data->email }}
                </li>
              </ul>

              <form action="" class="contact__container__form">
                <h3 class="contact__container__lable">liên hệ với chung tôi</h3>
                <input
                  type="text"
                  class="contact__container__form-input"
                  placeholder="Tên, họ*"
                />
                <input
                  type="email"
                  class="contact__container__form-input"
                  placeholder="Email*"
                />
                <input
                  type="text"
                  class="contact__container__form-input"
                  placeholder="Số điện thoại"
                />
                <textarea
                  name=""
                  id=""
                  rows="5"
                  class="contact__container__form-input contact__container__form-input--textare"
                  placeholder="Nội dung"
                ></textarea>

                <button class="btn contact__container__form-btn">
                  Gửi liên hê của bạn
                </button>
              </form>
            </div>

            <div class="contact__container__wrapper">
              <div class="contact__container__map">
                {!! $data->google_map !!}
              </div>
            </div>
          </div>
          <div class="contact__container__bottom"></div>
        </div>
      </div>
@endsection