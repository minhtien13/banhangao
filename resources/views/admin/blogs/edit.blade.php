@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên blog</label>
            <input type="text" name="title" value="{{ $blog->title }}" class="form-control" id="title" placeholder="Tên blog">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả ngắn blog</label>
            <textarea type="text" name="description" class="form-control">{{ $blog->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Chi tiết blog</label>
            <textarea type="text" name="content" id="content" class="form-control">{{ $blog->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Ảnh blog</label>
            <input type="hidden" name="thumb" value="{{ $blog->thumb }}" id="url_image">
            <div class="main__avatar">
            <input type="file"  class="form-control" id="upload_file">
                <img src="{{ $blog->thumb }}" alt="" class="main__avatar__image">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">trại thái</label>
            <select name="is_status" id="" class="form-control">
            <option {{ $blog->is_status == 1 ? 'selected' : '' }} value="1">Công khai</option>
            <option {{ $blog->is_status == 0 ? 'selected' : '' }} value="0">không Công khai</option>
            </select>
        </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary js__hide">Cập nhật blog</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>
@endsection
