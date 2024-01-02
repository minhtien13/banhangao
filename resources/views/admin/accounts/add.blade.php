@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên tài khoản</label>
            <input type="text" name="name" class="form-control" placeholder="Tên tài khoản">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Dịa chỉ gmail</label>
            <input type="email" name="email" class="form-control" placeholder="Dịa chỉ gmail">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Vai trò</label>
            <select name="level" id="" class="form-control">
                <option value="0" selected>Chọn vai trò</option>
                <option value="1">Quản trị viên</option>
                <option value="2">Admin</option>
                <option value="3">khách hàng</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">trại thái</label>
            <select name="is_active" id="" class="form-control">
                <option value="1">Công khai</option>
                <option value="0">không Công khai</option>
            </select>
        </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary">Tạo tài khoản mới</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection