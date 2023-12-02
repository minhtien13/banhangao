@extends('main')

@section('container')
    <div class="blog">
        <section class="container">
            <h2 class="blog__heading">{{$data->title}}</h2>

            <div class="blog_content">
                {!! $data->content !!}
            </div>
        </section>
    </div>
@endsection