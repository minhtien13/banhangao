@extends('main')

@section('container')
    @include('bread')

    <div class="blog_page">
        <div class="container">
            <div class="blog_page__main">
                 <div class="blog_page__wrapper">
                    <ul class="blog_page__list">
                        @foreach ($blogs as $blog)
                        <li class="blog_page__list-item">
                            <div class="blog_page__image">
                                <img src="{{ $blog->thumb }}" alt="shopbasic">
                            </div>
                            <div class="blog_page__right">
                                <a href="/blog/{{ \Str::slug($blog->title) }}/{{ $blog->id }}" class="blog_page__right-title">
                                    <h3>{{ $blog->title }}</h3>
                                </a>
                                <p class="blog_page__right-description">
                                    {{ $blog->description }}
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                 </div>
                 <div class="blog_page__wrapper">
                    @include('blogs.sidebar')
                 </div>
            </div>
        </div>
    </div>

@endsection
