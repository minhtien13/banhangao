@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Têm menu</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên menu">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Danh mực</label>
        <select name="parent_id" id="" class="form-control">
          <option value="0"> __danh mực cha__ </option>
          
          @foreach ($data as $row)
            <option value="{{ $row->id }}"> {{ $row->name }} </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Phân loại</label>
        <select name="limited_edition" id="" class="form-control">
          <option value="0">thường</option>
          <option value="1">phiên bản đật biệt</option>
        </select>
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
      <button type="submit" class="btn btn-primary">Thêm menu</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
  </form>  
@endsection