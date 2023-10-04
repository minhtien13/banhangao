@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề tin tức</label>
            <input type="text" value="{{ $data->title }}" name="title" class="form-control" id="title" placeholder="Tên giới thiệu">
        </div>
    
      <div class="form-group">
        <label for="exampleInputEmail1">giới thiệu tin tức</label>
        <textarea name="content" id="content" class="form-control">{{ $data->content }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">trại thái</label>
        <select name="is_active" id="" class="form-control">
          <option value="1" {{ $data->is_active == 1 ? 'selected' : '' }}>Công khai</option>
          <option value="0"  {{ $data->is_active == 0 ? 'selected' : '' }}>không Công khai</option>
        </select>
      </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary">Cập nhật trang giới thiệu</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection