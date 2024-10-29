@extends('main')

@section('container')
<div class="post">
    <div class="container">
      <h2 class="post__heading">Tin tức</h2>
      <div class="post__container">
        <div class="post__item">
          <div class="post__blog__image">
            <img
              src="{{ $post->thumb }}"
              alt=""
              class="post__blog__logo"
            />
          </div>
          <div class="post__blog__content">
            <a href="{{ $post->slug_url }}" class="post__blog__name">
              {{ $post->title }}
            </a>
            <div class="post__blog__media">
              <p class="post__blog__date">
                <i class="fas fa-calendar-alt"></i> {{ App\helpers\helper::headleRank($post->updated_at) }}, {{ date( "d/m/Y", strtotime($post->updated_at)) }}
              </p>
              <p class="post__blog__date">
                <i class="fas fa-clock"></i> Độc 2 phút
              </p>
            </div>
            <p class="post__blog__description">
              <div class="post__blog__description-txt post__blog__description-clamp">
                {!! $post->content !!}
              </div>

              <a href="javascript:void(0)" id="post__blog__down" class="post__blog__link">Độc thêm</a>
            </p>
          </div>
        </div>
        <div class="post__item">
          <div class="post__item__wrapper">
            <h3 class="post-list__heading">Menu</h3>
            <ul class="post-list">
              <li class="post-list__item">
                <a href="/san-pham" class="post-list__link">Sản phẩm</a>
              </li>
              <li class="post-list__item">
                <a href="/tin-tuc" class="post-list__link">Tin tức</a>
              </li>
              <li class="post-list__item">
                <a href="/gioi-thieu" class="post-list__link">Giới thiệu</a>
              </li>
              <li class="post-list__item">
                <a href="/lien-he" class="post-list__link">Liện hệ</a>
              </li>
            </ul>
          </div>

          <div class="post__item__wrapper">
            <a href="" class="post-list__heading post-list__heading--hover">
              Nội bật
            </a>
            <div class="post-list__info">
              <img
                src="{{ $post->thumb }}"
                alt=""
                class="post-list__info__logo"
              />
              <a href="{{ $post->slug_url }}" class="post-list__info__title">
                Sự thay đổi logo của basic
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
