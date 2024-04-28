@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nhập mật khẩu mới</label>
            <input type="password" name="password" value="" class="form-control" placeholder="Nhập mật khẩu mới">
        </div>

    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary">Thay đổi</button>
      <a href="/admin/main" class="btn btn-secondary ml-auto">Hủy</a>
    </div>
    @csrf
  </form>  
@endsection