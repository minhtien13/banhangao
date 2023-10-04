@extends('admin.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN </th>
                <th>SỐ THOẠI </th>
                <th>GMAIL </th>
                <th>TRẠI THÁI</th>
                <th>CẬP NHẬT</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td style="width: 20px;">{{ $row->id }}</td>
                    <td title="Địa chỉ shop: {{ $row->address }}">{{ $row->title }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{!! \App\helpers\helper::staturs($row->is_active) !!}</td>
                    <td>{{ $row->updated_at }}</td>
                    <td>
                        <div class="main__table__delete">
                            <a href="javascript:void(0)" onClick="deleteRow('/admin/contact/remove', {{ $row->id }} )" class="main__table__delete__link main__table__delete__link--remove">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="/admin/contact/edit/{{ $row->id }}" class="main__table__delete__link main__table__delete__link--edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>                
            @endforeach

        </tbody>
    
    </table>    
@endsection