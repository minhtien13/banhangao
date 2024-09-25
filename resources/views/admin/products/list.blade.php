@extends('admin.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN SẢN PHẨM</th>
                <th>MENU</th>
                <th>GIÁ GỐC</th>
                <th>GIÁ GIÁM</th>
                <th>HÌNH</th>
                <th>TRẠI THÁI</th>
                <th>CẬP NHẬT</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td style="width: 20px;">{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td>
                        @if (isset( $row->menu->id))
                           {{ $row->menu->name }}
                        @endif
                    </td>
                    <td>{{ number_format($row->price)}}</td>
                    <td>{{ number_format($row->price_sale)}}</td>
                    <td>
                        <img src="{{ $row->thumb }}" alt="" class="main__product__image">
                    </td>
                    <td>{!! \App\helpers\helper::staturs($row->is_active) !!}</td>
                    <td>{{ $row->updated_at }}</td>
                    <td>
                        <div class="main__table__delete">
                            <a href="javascript:void(0)" onClick="deleteRow('/admin/product/remove', {{ $row->id }} )" class="main__table__delete__link main__table__delete__link--remove">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="/admin/product/edit/{{ $row->id }}" class="main__table__delete__link main__table__delete__link--edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
      <div class="d-flex justify-content-center">
          {{ $data->links() }}
    </div>
@endsection
