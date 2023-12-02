@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên chính sách</label>
            <input type="text" name="title" class="form-control" id="is_title"placeholder="Tên chính sách">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Đường dãn</label>
            <input type="text" name="link_url" id="link_url" class="form-control" placeholder="Đường dãn">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Chọn chính sách hoặc hổ trợ</label>
            <select name="is_type" class="form-control">
              <option value="1">Chính sách</option>
              <option value="0">Hổ trợ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Sấp xếp</label>
            <input type="number" value="1" name="sort_by" class="form-control" placeholder="Sấp xếp">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Thông tin chính sách</label>
            <textarea id="content" name="content" class="form-control"></textarea>
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
      <button type="submit" class="btn btn-primary js__hide">Tạo chính sách mới</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection