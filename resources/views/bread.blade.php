<div class="bread">
    <div class="container">
      <ul class="bread__list">
        <li class="bread__list-item">
          <a href="/" class="bread__list-link--home bread__list-link">Trang chủ /</a>
        </li>

        @if ($staturs == 3)
          {!! App\helpers\helper::bar($product->menu_id, $product->title) !!}
        @endif

        @if ($staturs != 3)
          {!! App\helpers\helper::bar(0, $title) !!}
        @endif
        
      </ul>
    </div>
  </div>