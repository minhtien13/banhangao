@extends('admin.main')

@section('container')
<form  action="" method="POST">
    <div class="card-body">
      <div class="row">
       <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Tiêu đề sản phẩm</label>
                <input type="text" name="title" value="{{ $product->title }}" class="form-control" id="title" placeholder="Tên sản phẩm">
            </div>
       </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">link</label>
                <input type="text" name="slug_url" class="form-control" value="{{ $product->slug_url }}" id="slug_title" placeholder="Đường dãn" readonly>
            </div>
        </div>
      </div>
      <div class="row">        
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã sản phẩm</label>
                <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}" placeholder="Mà sản phẩm" >
            </div>
        </div>
       <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Màu sắc sản phẩm</label>
                <input type="text" name="product_color" class="form-control" value="{{ $product->product_color }}" placeholder="Màu sắc">
            </div>
       </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Danh mục</label>
        <select name="menu_id" id="" class="form-control">
          @foreach ($data as $row)
            
          <option value="{{ $row->id }}" {{ $row->id == $product->menu_id ? 'selected' : '' }}>{{ $row['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="row">
        <div class="col-6">
             <div class="form-group">
                 <label for="exampleInputEmail1">Giá gốc</label>
                 <input type="number" name="price" class="form-control" id="price_old" value="{{ $product->price }}">
             </div>
        </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá giám</label>
                    <input type="number" name="price_sale" class="form-control" id="price_sale" value="{{ $product->price_sale }}">
                </div>
            </div>
       </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Chi tiết</label>
        <textarea name="content" class="form-control" id="content">{{ $product->content }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">sự kiện</label>
        <select name="sale" id="" class="form-control">
          <option value="1">giám 50%</option>
          <option value="1">giám 50%</option>
          <option value="1">giám 50%</option>
          <option value="1">giám 50%</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">link</label>
        <input type="file"  class="form-control" id="upload_file" placeholder="Đường dãn"> 
        <input type="hidden" name="thumb" id="url_image" value="{{ $product->thumb }}">
        <div class="main__avatar">
            <img src="{{ $product->thumb }}" alt="" class="main__avatar__image">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">trại thái</label>
        <select name="is_active" id="" class="form-control">
          <option value="1" {{ $product->is_active == 1 ? 'selected' : ''}}>Công khai</option>
          <option value="0" {{ $product->is_active == 0 ? 'selected' : ''}}>không Công khai</option>
        </select>
      </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary js__hide">cập nhật sản phẩm</button>
    </div>
    @csrf
  </form>    
@endsection