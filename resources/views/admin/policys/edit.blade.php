@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên chính sách</label>
            <input type="text" name="title" value="{{ $data->title }}" class="form-control" id="is_title"placeholder="Tên chính sách">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Đường dãn</label>
            <input type="text" name="link_url" id="link_url" value="{{ $data->link_url }}" class="form-control" placeholder="Đường dãn">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Chọn chính sách hoặc hổ trợ</label>
            <select name="is_type" class="form-control">
              <option value="1" {{ $data->is_type == 1 ? 'selected' : ''}}>Chính sách</option>
              <option value="0" {{ $data->is_type == 0 ? 'selected' : ''}}>Hổ trợ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Sấp xếp</label>
            <input type="number" value="{{ $data->sort_by }}" name="sort_by" class="form-control" placeholder="Sấp xếp">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Thông tin chính sách</label>
            <textarea id="content" name="content" class="form-control">{{ $data->content }}</textarea>
        </div>
 
      <div class="form-group">
        <label for="exampleInputEmail1">trại thái</label>
        <select name="is_active" id="" class="form-control">
          <option {{ $data->is_active == 1 ? 'selected' : ''}} value="1">Công khai</option>
          <option {{ $data->is_active == 0 ? 'selected' : ''}} value="0">không Công khai</option>
        </select>
      </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary js__hide">cập nhật chính sách mới</button>
    </div>
    @csrf
  </form>  
@endsection
