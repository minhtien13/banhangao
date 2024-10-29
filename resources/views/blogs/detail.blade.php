@extends('main')

@section('container')
    @include('bread')

    <div class="blog_page">
        <div class="container">
            <div class="blog_page__main">
                 <div class="blog_page__wrapper">
                    <div class="blog_page__detail">
                        <h1 class="blog_page__detail-title">
                            {{ $blog->title }}
                        </h1>

                        <div class="blog_page__detail-image">
                            <img src="{{ $blog->thumb }}" alt="shopbasic">
                        </div>

                        <div class="blog_page__detail-description">
                            <h3 class="blog_page__detail--heading">Mô tả bài viết</h3>
                            <p> {{ $blog->description }} </p>
                        </div>

                        <div class="blog_page__detail-content">
                            <h3 class="blog_page__detail--heading">Chi tiết bài viết</h3>
                            <div class="blog_page__blog--container"> {!! $blog->content !!} </div>
                        </div>
                    </div>
                 </div>
                 <div class="blog_page__wrapper">
                    @include('blogs.sidebar')
                 </div>
            </div>
        </div>
    </div>

@endsection
