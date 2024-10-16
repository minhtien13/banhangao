@extends('admin.main')

@section('container')
    <div class="container-fiuld p-3">
        <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner pb-0">
                            <h3>
                                {{ App\helpers\helper::countRow('products')}}
                            </h3>

                            <p>Sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-product-hunt"></i>
                        </div>

                        <div class="d-flex pr-2 pl-2 pb-2">
                            <a href="/admin/product/add" class="text-light"><i class="fas fa-plus"></i></a>
                            <a href="/admin/product/list" class="text-light ml-2"><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner pb-0">
                            <h3>
                                {{ App\helpers\helper::countRow('users')}}
                            </h3>

                            <p>Tài khoản</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="d-flex pr-2 pl-2 pb-2">
                            <a href="/admin/account/add" class="text-light"><i class="fas fa-plus"></i></a>
                            <a href="/admin/account/list" class="text-light ml-2"><i class="fas fa-list"></i></a>
                            <a href="/admin/account/contomer" class="text-light ml-2"><i class="fas fa-users"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner pb-0">
                            <h3>
                                {{ App\helpers\helper::countRow('carts')}}
                            </h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>

                        <div class="d-flex pr-2 pl-2 pb-2">
                            <a href="/admin/cart/list" class="text-light ml-2"><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
