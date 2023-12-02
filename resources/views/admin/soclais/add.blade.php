@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
    
        <div class="form-group">
            <label for="exampleInputEmail1">Tên liên kết</label>
            <input type="text" name="name" class="form-control" id="title" placeholder="Tên liên kết">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Đường dẫn liên kết</label>
            <input type="text" name="slug_link" class="form-control" id="title" placeholder="Đường dẫn liên kết">
        </div>
      <div class="form-group">
        <label for="exampleInputEmail1">hình đại diện liên kết</label>
        <input type="file"  class="form-control" id="upload_file" > 
        <input type="hidden" name="thumb" id="url_image">
        <div class="main__avatar">

        </div>
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
      <button type="submit" class="btn btn-primary js__hide">Tạo liên kết</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection