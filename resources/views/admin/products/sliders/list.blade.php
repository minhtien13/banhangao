@extends('admin.main')

@section('container')

<div class="mt-2 mb-2 pl-3 pr-3 d-flex justify-content-end">
    <a class="text-dark mr-1" href="/admin/product/slider/add/{{ $product_id }}">
        <i class="fas fa-plus"></i>
    </a>
</div>


<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>HÌNH</th>
            <th>XẾP HẠNG</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($sliders as $slider)
        <tr>
            <td><a href="#">#{{ $slider->id }}</a></td>
            <td>
                <img src="{{ $slider->thumb }}" alt="" class="main__product__image">
            </td>
            <td>{{ $slider->is_sort_by }}</td>
            <td>
                <div class="main__table__delete">
                    <a href="javascript:void(0)" onClick="deleteRow('/admin/product/slider/remove', {{ $slider->id }} )" class="main__table__delete__link main__table__delete__link--remove">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
