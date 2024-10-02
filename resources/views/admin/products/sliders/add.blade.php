@extends('admin.main')

@section('container')

<div class="mt-2 mb-2 pl-3 pr-3 d-flex justify-content-end">
    <a class="text-dark mr-1" href="/admin/product/slider/list/{{ $product_id }}"><i class="fas fa-list"></i></a>
</div>

<form  action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Xếp hạng</label>
            <input type="number" value="1" name="is_sort_by" class="form-control" placeholder="Xếp hạng">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Ảnh slider</label>
            <input type="file"  class="form-control" id="upload_file">
            <input type="hidden" name="thumb" id="url_image">
            <div class="main__avatar">
                {{-- IMAGES SRC --}}
            </div>
        </div>
    </div>
    <div class="card-footer d-flex">
      <button type="submit" class="btn btn-primary js__hide">Thêm slider sản phẩm</button>
      <button type="reset" class="btn btn-secondary ml-auto">Chanel</button>
    </div>
    @csrf
</form>
@endsection
