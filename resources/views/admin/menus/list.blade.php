@extends('admin.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN MENU</th>
                <th>TRẠI THÁI</th>
                <th>CẬP NHẬT</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
           {!! App\helpers\helper::menus($data) !!}
        </tbody>
    </table>
@endsection