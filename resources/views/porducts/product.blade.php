@extends('main')

@section('container')
    

  @include('banner')

  <section class="cuopons">
    <div class="container">
      <ul class="cuopons__list">
        <li class="cuopons__list-item">
          <img src="/template/images/sale.PNG" alt="" class="cuopons__list-image" />
          <div class="cuopons__list-content">
            <h3 class="cuopons__list-title">NHẬP MÃ: LAM15</h3>
            <p class="cuopons__list-desc">
              Mã giảm 15% cho đơn hàng tối thiểu 5tr
            </p>
            <div class="cuopons__list-bottom">
              <span class="btn cuopons__list-copy">Sao chép</span>
              <span href="" class="cuopons__list-info btn">Điều kiện</span>
            </div>
          </div>
        </li>
        <li class="cuopons__list-item">
          <img src="/template/images/sale.PNG" alt="" class="cuopons__list-image" />
          <div class="cuopons__list-content">
            <h3 class="cuopons__list-title">NHẬP MÃ: LAM15</h3>
            <p class="cuopons__list-desc">
              Mã giảm 15% cho đơn hàng tối thiểu 5tr
            </p>
            <div class="cuopons__list-bottom">
              <span class="btn cuopons__list-copy">Sao chép</span>
              <span href="" class="cuopons__list-info btn">Điều kiện</span>
            </div>
          </div>
        </li>
        <li class="cuopons__list-item">
          <img src="/template/images/vc.PNG" alt="" class="cuopons__list-image" />
          <div class="cuopons__list-content">
            <h3 class="cuopons__list-title">NHẬP MÃ: LAM15</h3>
            <p class="cuopons__list-desc">
              Mã giảm 15% cho đơn hàng tối thiểu 5tr
            </p>
            <div class="cuopons__list-bottom">
              <span class="btn cuopons__list-copy">Sao chép</span>
              <span href="" class="cuopons__list-info btn">Điều kiện</span>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>

  @include('porducts.loo')

  {!! App\helpers\helper::autoMenuList($menuHome) !!}
  
@endsection