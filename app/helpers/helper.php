<?php

namespace App\helpers;

use App\Http\Services\cart\CartService;
use App\Http\Services\menu\MenuService;
use App\Http\Services\product\productService;
use App\Models\product;
use Illuminate\Support\Facades\Session;

class helper  
{
    public static function menus($data, $id = 0, $string = '')
    {
        $html = '';

        foreach ($data as $key => $row) {
            if ($row['parent_id'] == $id) {
                $html .= '
                <tr id="id_'.  $row['id'] . '">
                    <td style="width: 20px;">' . $row['id'] . '</td>
                    <td>' . $string . $row['name'] . '</td>
                    <td> '. self::staturs($row['is_active']) . ' </td>
                    <td>' . $row['updated_at'] . '</td>
                    <td>
                        <div class="main__table__delete">
                            <a href="javascript:void(0)" onClick="deleteRow(\'/admin/menu/remove\', '. $row['id'] .')" class="main__table__delete__link main__table__delete__link--remove">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="/admin/menu/edit/'. $row['id'] . '" class="main__table__delete__link main__table__delete__link--edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                ';
                unset($data[$key]);
                $html .= self::menus($data, $row['id'], '|__');
            }
        }

        return $html;
    }

    public static function staturs($active)
    {
        return $active == 1 ? '<button type="button" class="btn main__active btn-success">Công khai</button>'
            : '<button type="button" class="btn main__active btn-danger">Không công khai</button>';
    }

    public static function headPrice($priceOld, $priceSale, $class = 'product-list__price')
    {
        if ($priceOld == 0 && $priceSale == 0) {
            return '<a href="/lien-he.html" class="'. $class .'">Liên Hệ</a>';
        }

        if ($priceOld != 0 && $priceSale == 0) {
            return '<span class="'. $class .'">' . number_format($priceOld) . '<sup>đ</sup></span>';
        }

        if ($priceOld != 0 && $priceSale != 0) {
            return '<span class="'. $class .'">' . number_format($priceSale) . '<sup>đ</sup></span>';
        }
       

    }

    public static function bar($menu = 0, $title = '')
    {
        $menus = new MenuService;

        if ($menu != 0) {
            $menuData = $menus->menuId($menu);
        }

        if ($menu == 0) {
            return ' <li class="bread__list-item">
                      <span class="bread__list-link">'. $title .'</span>
                    </li>';
        }
      
        if ($menu != 0) {
            return ' <li class="bread__list-item">
                      <a href="/danh-muc/'.$menuData->id . '-'  . \Str::slug($menuData->name, '-') .'.html" class="bread__list-link">'. $menuData->name .' /</a>
                    </li>
                     <li class="bread__list-item">
                      <span class="bread__list-link">'. $title .'</span>
                    </li>
                    
                    ';
        }
    }

    public static function autoMenuList($data) {
        $html = '';

       foreach ($data as $item) {
            if ($item['parent_id'] == 0) { 
                if ($item['limited_edition'] == 0) {
                    $html .= '
                        <section class="product">
                        <div class="container">
                            <div class="product__bar product__bar--flex">
                            <div
                            class="product__bar-heading product__select-heading down"
                            id=""
                            >
                            <h2>'. $item['name'] .'</h2>
                            <span class="product__bar-heading-icon">R</span>
                            <span class="product__select-icon">
                                <i
                                class="product__select-down on-show fa-solid fa-chevron-down"
                                ></i>
                            </span>
                            <ul class="product__select__list">
                               ' . self::headMenu($item['id']) .'
                            </ul>
                            </div>
                        </div>
                    
                    ';

                    $html .= self::item($item['id']);
                    
                    $html .= '
                    
                        <div class="product__bottom" id="product__bottom__' . $item['id'] . '">
                            <a href="/danh-sach/' . $item['id'] . '-' . \Str::slug($item['name']) . '.html" class="btb product__bottom-link"
                            >Xem tất cả <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                        </div>
                        </section>
                        ';
                }

                if ($item['limited_edition'] == 1) {
                    $html .= '
                        <section class="product">
                            <div class="container">
                                <div class="product__bar">
                                <div class="product__bar-heading product__bar--flex">
                                    <h2 class="product__bar-heading__txt product__bar-heading__flex">
                                        ' . $item['name'] . ' BASIC<span class="product__bar-heading-icon">R</span>
                                    </h2>
                                    <div
                                        class="product__select-heading m-0 product__select-heading--ml"
                                    >
                                        <div class="down">
                                        Piên bản giới hạn
                                        <span class="product__select-icon product__select-icon__ml">
                                            <i
                                            class="product__select-down os fa-solid fa-chevron-down"
                                            ></i>
                                        </span>
                                        </div>
                            
                                        <ul class="product__select__list" >
                                            ' . self::headMenu($item['id']) .'
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            ';

                            $html .= self::item($item['id']);
                            
                            $html .= '                        
                                <div class="product__bottom" id="product__bottom__' . $item['id'] . '">
                                    <a href="/danh-sach/' . $item['id'] . '-' . \Str::slug($item['name']) . '.html" class="btb product__bottom-link"
                                    >Xem tất cả <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div> 
                            </div>
                        </section>
                    
                    ';
                }
            }
        }

        return $html;
    }

    public static function item($menuId)
    {

        $html = '';
        $product = new productService;
        $data = $product->getListMenu($menuId);

        $html .= '<ul class="product-list" id="product-list__' . $menuId .'">';
        foreach ($data as $row) {
            $html .= '
                    <li class="product-list__item">
                        <div class="product-list__ima">
                            <img
                            src="'. $row['thumb'] .'"
                            alt=""
                            class="product-list__image"
                            />
                            <img
                            src="/template/images/logo.jpg"
                            alt=""
                            class="product-list__logo"
                            />

                            <div class="product-list__active">
                            <a href="/san-pham/'. $row['slug_url'] .'.html" class="product-list__active-link">
                                <i class="fas fa-water"></i>
                            </a>
                            <a
                                href="javascript:void(0)"
                                onclick="loadDetall('. $row['id'] .')"
                                class="product-list__active-link"
                            >
                                <i class="fas fa-eye"></i>
                            </a>
                            </div>
                        </div>
                        <div class="product-list__content">
                            <a href="/san-pham/'. $row['slug_url'] .'.html" class="product-list__title">
                            <h3>'. $row['title'] .'</h3>
                            </a>
                            '. self::headPrice($row['price'], $row['price_sale']) .'
                            <span
                            class="product-list__color"
                            style="--product-color: '. $row['product_color'] .'"
                            ></span>
                        </div>
                    </li>
                ';
        }

        $html .= '</ul>';
        
        return $html;
    }

    public static function headMenu($menuId)
    {
        $menu = new MenuService;
        $data = $menu->getHome($menuId);
        $html = '';

        foreach ($data as $row) {
            $html .= '
                <li class="product__select__list-item">
                <a
                    href="javascript:void(0)" onClick="loadProductList(' . $row['id'] . ', ' . $menuId . ')"
                    class="product__select__list-link product__select__list-link--active"
                    >'. $row['name'] .'<span class="product__bar-heading-icon"
                    >R</span
                    ></a
                >
                </li>
            ';
        }

        return $html;
    }

    public static function autoLoadCart()
    {
        $carts = Session::get('carts');
        $html = '';
        $cartService = new CartService;
        $data = $cartService->getProduct();

        if (!isset($carts) || count($carts) == 0) {
            $html .= '
                <p class="header__cart__dropdown-message ">
                   Giỏ hàng không có sản phẩm
                </p>    
            ';
        }

        if (isset($carts) && count($carts) != 0) {
            $sumAll = 0;
            $html .= '<ul class="header__cart__list">';
            foreach ($data as $key => $row) {
                $price = $row['price_sale'] != 0 ? $row['price_sale'] : $row['price'];
                $sumAll += $price * $carts[$row['id']];

                $html .= '
                    <li class="header__cart__list-item" id="cart__dropdown__'. $row['id'] .'">
                    <a href="" class="header__cart__list-ima">
                    <img
                        src="'. $row['thumb'] .'"
                        alt="'. $row['title'] .'"
                        class="header__cart__list-image"
                    />
                    </a>
                    <div class="header__cart__list-content">
                    <a href="" class="header__cart__list-title">
                    '. $row['title'] .'
                    </a>
                    <p class="header__cart__list-type">m / '. $row['product_color'] .'</p>
                    <span class="header__cart__list-price">
                        '. number_format($price) .'<sub>đ</sub>
                    </span>
                    <span class="header__cart__list-qty">x '. $carts[$row['id']] .'</span>
                    </div>
                    <a href="javascript:void(0)" onClick="deleteCart('. $row['id'] .')" class="header__cart__list-close">
                    <i class="fas fa-times"></i>
                    </a>
                </li>
                ';
            }
            $html .= '</ul>';

            $html .= '
            <div class="header__cart__bottom">
            <div class="header__cart__payment">
              <p class="header__cart__payment-all">
                Tổng tiền tính tạm:
                <span>'. number_format($sumAll) .'<sup>đ</sup></span>
              </p>
              <a href="/dat-hang.html" class="btn header__cart__payment-btn">
                Tiến hành thanh toán
              </a>
            </div>
          </div>
            ';
        }
        
        return $html;
    }
}