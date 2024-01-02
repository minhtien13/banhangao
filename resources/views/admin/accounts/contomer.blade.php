@extends('admin.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN TÀI KHOẢN</th>
                <th>VAI TRÒ</th>
                <th>TRẠI THÁI</th>
                <th>CẬP NHẬT</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                @if ($row->level == 3)
                    <tr>
                        <td style="width: 20px;">{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->level == 3 ? 'Khách hàng' : 'Admin' }}</td>
                        <td>{!! $row->staturs == 1 ? '<p class="text-primary">Hoạt động</p>' : '<p class="text-danger">Tạm khóa</p>' !!}</td>
                        <td>{{ $row->updated_at }}</td>
                        <td>
                            <div class="main__table__delete">
                                <a href="javascript:void(0)" onClick="deleteRow('/admin/account/remove', {{ $row->id }} )" class="main__table__delete__link main__table__delete__link--remove">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="/admin/account/edit/{{ $row->id }}" class="main__table__delete__link main__table__delete__link--edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>    
                @endif
             
            @endforeach

        </tbody>
    
    </table>    
@endsection