@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên blog</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Tên blog">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả ngắn blog</label>
            <textarea type="text" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Chi tiết blog</label>
            <textarea type="text" name="content" id="content" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Ảnh blog</label>
            <input type="file"  class="form-control" id="upload_file">
            <input type="hidden" name="thumb" id="url_image">
            <div class="main__avatar">
                {{-- images --}}
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">trại thái</label>
            <select name="is_status" id="" class="form-control">
            <option value="1">Công khai</option>
            <option value="0">không Công khai</option>
            </select>
        </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary js__hide">Tạo blog</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>
@endsection
