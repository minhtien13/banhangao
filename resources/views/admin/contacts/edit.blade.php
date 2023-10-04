@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề liên hệ</label>
            <input type="text" name="title" value="{{ $data->title }}" class="form-control" id="title" placeholder="Tên liên hệ">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input type="text" name="address" value="{{ $data->address }}" class="form-control" id="title" placeholder="Địa chỉ shop">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Số thoại</label>
            <input type="text" name="phone" value="{{ $data->phone }}" class="form-control" id="title" placeholder="Số thoại shop">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ gmail</label>
            <input type="text" name="email" value="{{ $data->email }}" class="form-control" id="title" placeholder="Địa chỉ gmail shop">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nhúng google map</label>
            <input type="text" name="google_map" value="{{ $data->google_map }}" class="form-control" id="title" placeholder="Vị trí shop">
        </div>

      <div class="form-group">
        <label for="exampleInputEmail1">trại thái</label>
        <select name="is_active" id="" class="form-control">
          <option value="1" {{ $data->is_active == 1 ? 'selected' : '' }}>Công khai</option>
          <option value="0" {{ $data->is_active == 0 ? 'selected' : '' }}>không Công khai</option>
        </select>
      </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary">Cập nhật trang liên hệ</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection