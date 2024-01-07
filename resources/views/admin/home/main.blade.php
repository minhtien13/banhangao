@extends('admin.main')

@section('container')
    <div class="container-fiuld p-3">
        <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ App\helpers\helper::countRow('products')}}
                            </h3>

                            <p>Sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-product-hunt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                {{ App\helpers\helper::countRow('users')}}
                            </h3>

                            <p>Tài khoản</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                {{ App\helpers\helper::countRow('carts')}}
                            </h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection