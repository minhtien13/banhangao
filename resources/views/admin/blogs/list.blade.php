@extends('admin.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN BLOG</th>
                <th>ẢNH BÌA</th>
                <th>TRẠNG THÁI</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>
                        <a href="#">#{{ $blog->id }}</a>
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <img src="{{ $blog->thumb }}" alt="" class="main__product__image">
                    </td>
                    <td>
                        {!! App\helpers\helper::staturs($blog->is_status) !!}
                    </td>
                    <td>
                        <div class="main__table__delete">
                            <a href="javascript:void(0)" onclick="deleteRow('/admin/blog/remove', {{ $blog->id }} )" class="main__table__delete__link main__table__delete__link--remove">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="/admin/blog/edit/{{ $blog->id }}" class="main__table__delete__link main__table__delete__link--edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
