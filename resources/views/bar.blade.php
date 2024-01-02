@if ($staturs == 0)
<div class="product__bar">
    <h2 class="product__bar-heading">
      SẢN PHẨM NỔI BẬT CỦA BASIC<span class="product__bar-heading-icon"
        >R</span
      >
    </h2>
    <p class="product__bar-txt">hit</p>
  </div>
@endif

@if ($staturs == 1)
    <div class="product__bar product__bar--space-between product__bar--flex">
        <h2 class="product__bar-heading">{{ substr($title, 0, -11)  }}</h2>

        <div class="product__sort">
        <span class="product__sort-name">Sếp hạng:</span>
        <select id="filter_product" class="product__sort-select">
            <option value="1">Giá tăng dần</option>
            <option value="2">Giá giảm dần</option>
            <option value="3">mới nhất</option>
            <option value="4">Giảm giá</option>
        </select>
        </div>
    </div>
@endif