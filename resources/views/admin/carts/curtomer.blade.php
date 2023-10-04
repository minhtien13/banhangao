@extends('admin.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN KHÁCH</th>
                <th>TÊN SDT</th>
                <th>TÊN GMAIL</th>
                <th>NGÀY ĐẶT HÀNG</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
            @foreach ($data as $row)         
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <div class="main__table__delete">
                            <a href="javascript:void(0)" onClick="deleteRow('/admin/cart/remove', {{ $row->id }} )" class="main__table__delete__link main__table__delete__link--remove">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="/admin/cart/view/{{ $row->id }}" class="main__table__delete__link main__table__delete__link--edit">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            <tbody>
            
        </tbody>
    </table>
@endsection