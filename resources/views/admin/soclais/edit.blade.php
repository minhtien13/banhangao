@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">   
        <div class="form-group">
            <label for="exampleInputEmail1">Tên liên kết</label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="title" placeholder="Tên liên kết">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Đường dẫn liên kết</label>
            <input type="text" name="slug_link" value="{{ $data->slug_link }}" class="form-control" id="title" placeholder="Đường dẫn liên kết">
        </div>
      <div class="form-group">
        <label for="exampleInputEmail1">hình đại diện liên kết</label>
        <input type="file"  class="form-control" id="upload_file" placeholder="Đường dãn"> 
        <input type="hidden" name="thumb" value="{{ $data->thumb }}" id="url_image">
        <div class="main__avatar">
            <img src="{{ $data->thumb }}" alt="" class="main__avatar__image">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">trại thái</label>
        <select name="is_active" id="" class="form-control">
          <option {{ $data->is_active == 1 ? 'selected' : '' }} value="1">Công khai</option>
          <option {{ $data->is_active == 0 ? 'selected' : '' }} value="0">không Công khai</option>
        </select>
      </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary js__hide">Cập nhật liên kết</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection