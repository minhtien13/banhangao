@extends('main')

@section('container')
    @include('bread')


    <div class="introduce">
        <div class="container">
          <div class="introduce__container">
            <h2
              class="introduce__container__heading contact__container__heading"
            >
             {{ $intro->title }}
            </h2>
            <div class="introduce__container__content">
              {!! $intro->content !!}
            </div>
          </div>
        </div>
    </div>

@endsection