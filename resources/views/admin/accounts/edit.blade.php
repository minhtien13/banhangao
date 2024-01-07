@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên tài khoản</label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Tên tài khoản">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Vai trò</label>
            <select name="level" id="" class="form-control">
                <option value="1" {{ $data->level == 1 ? 'selected' : '' }}>Quản trị viên</option>
                <option value="2" {{ $data->level == 2 ? 'selected' : '' }}>Admin</option>
                <option value="3" {{ $data->level == 3 ? 'selected' : '' }}>khách hàng</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">trại thái</label>
            <select name="staturs" id="" class="form-control">
                <option value="1" {{ $data->staturs == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $data->staturs == 0 ? 'selected' : '' }}>Tạm khóa</option>
            </select>
        </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary">Lưu lại</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection