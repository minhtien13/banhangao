@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên tài khoản</label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Tên tài khoản">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Gmail / Tài khoản</label>
            <input type="email" name="email" value="{{ $data->email }}" class="form-control" placeholder="Tên tài khoản">
        </div>

    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary">Thay đổi</button>
      <a href="/admin/main" class="btn btn-secondary ml-auto">Hủy</a>
    </div>
    @csrf
  </form>  
@endsection