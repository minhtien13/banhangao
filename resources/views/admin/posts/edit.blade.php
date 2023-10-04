@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
      <div class="row">
       <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Tiêu đề giới thiệu</label>
                <input type="text" name="title" value="{{ $data->title }}" class="form-control" id="title" placeholder="Tên giới thiệu">
            </div>
       </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">link</label>
                <input type="text" name="slug_url"  value="{{ $data->slug_url }}" class="form-control" placeholder="Đường dãn">
            </div>
        </div>
      </div>
    
      <div class="form-group">
        <label for="exampleInputEmail1">giới thiệu</label>
        <textarea name="content" id="content" class="form-control">{{ $data->content }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Ảnh</label>
        <input type="file"  class="form-control" id="upload_file" placeholder="Đường dãn"> 
        <input type="hidden" value="{{ $data->thumb }}" name="thumb" id="url_image">
        <div class="main__avatar">
            <img src="{{ $data->thumb }}" alt="" class="main__avatar__image">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">trại thái</label>
        <select name="is_active" id="" class="form-control">
          <option value="1" {{ $data->is_active == 1 ? 'selected' : '' }} >Công khai</option>
          <option value="0" {{ $data->is_active == 0 ? 'selected' : '' }}>không Công khai</option>
        </select>
      </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary">cập nhậts giới thiệu</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection