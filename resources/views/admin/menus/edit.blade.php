@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Têm menu</label>
        <input type="text" name="name" value="{{ $data['name'] }}" class="form-control" id="exampleInputEmail1" placeholder="Tên menu">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Danh mực</label>
        <select name="parent_id" id="" class="form-control">
          <option value="0"> __danh mực cha__ </option>
          
          @foreach ($dataMenu as $row)
            <option value="{{ $row->id }}" {{ $row->id == $data->menu_id ? 'selected' : ''}}> {{ $row->name }} </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Phân loại</label>
        <select name="limited_edition" id="" class="form-control">
          <option value="0" {{ $data->limited_edition == 0 ? 'selected' : ''}}>thường</option>
          <option value="1" {{ $data->limited_edition == 1 ? 'selected' : ''}}>phiên bản đật biệt</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">trại thái</label>
        <select name="is_active" id="" class="form-control">
          <option value="1" {{ $data['is_active'] == 1 ? 'selected' : ''; }}>Công khai</option>
          <option value="0" {{ $data['is_active'] == 0 ? 'selected' : ''; }}>không Công khai</option>
        </select>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập nhật menu</button>
    </div>
    @csrf
  </form>  
@endsection