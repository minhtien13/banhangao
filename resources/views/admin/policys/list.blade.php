@extends('admin.main')

@section('container')
<table class="table">
    <tr>
        <th>ID</th>
        <th>TÊN</th>
        <th>XẾP HẠNG</th>
        <th>THỂ LOẠI</th>
        <th>TRẠI THÁI</th>
        <th>&nbsp;</th>
    </tr>

    @foreach ($data as $row)
    <tr>
        <td style="width: 20px;"> {{ $row->id }} </td>
        <td> {{ $row->title }}</td>
        <td> {{ $row->sort_by }}</td>
        <td> {{ $row->is_type == 1 ? 'chính sách' : 'bảo mật' }}</td>
        
        <td>
            {!! App\helpers\helper::staturs($row->is_active) !!}
        </td>
        <td>
            <div class="main__table__delete">
                <a href="javascript:void(0)" onClick="deleteRow('/admin/policy/remove',  {{ $row->id }})" class="main__table__delete__link main__table__delete__link--remove">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="/admin/policy/edit/{{ $row->id }}" class="main__table__delete__link main__table__delete__link--edit">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
        </td>
    </tr>
   @endforeach
</table>
@endsection