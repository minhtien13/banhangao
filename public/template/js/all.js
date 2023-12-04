$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function loadProductList(id, menuId) {
    $.ajax({
        type: "POST",
        url: "/load-product-list",
        data: { id },
        dataType: "JSON",
        success: function (resuit) {
            var html = "";
            if (resuit.error == false) {
                resuit.data.forEach(function (row, key) {
                    html += `
                    <li class="product-list__item">
                        <div class="product-list__ima">
                            <img src="${
                                row["thumb"]
                            }" alt="" class="product-list__image">
                            <img src="/template/images/logo.jpg" alt="" class="product-list__logo">

                            <div class="product-list__active">
                            <a href="/san-pham/${
                                row["slug_url"]
                            }.html" class="product-list__active-link">
                                <i class="fas fa-water"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="loadDetall(${
                                row["id"]
                            })" class="product-list__active-link">
                                <i class="fas fa-eye"></i>
                            </a>
                            </div>
                        </div>
                        <div class="product-list__content">
                            <a href="/san-pham/${
                                row["slug_url"]
                            }.html" class="product-list__title">
                            <h3>${row["title"]}</h3>
                            </a>
                            ${price(row["price"], row["price_sale"])}
                            <span class="product-list__color" style="--product-color: ${
                                row["product_color"]
                            }"></span>
                        </div>
                    </li>
                `;
                });

                var link = `
                <a href="/danh-sach/${id}-ao-khoac.html" class="btb product__bottom-link">Xem tất cả <i class="fa-solid fa-chevron-right"></i>
                                </a>
                `;
                $("#product-list__" + menuId).html(html);
                $("#product__bottom__" + menuId).html(link);
            } else {
                alert(resuit.message);
            }
        },
    });
}

function price(priceOld = 0, priceSale = 0) {
    var html = "";

    if (priceOld == 0 && priceSale == 0) {
        html += `<a href="" class="product-list__price">Liên Hệ</a>`;
    }

    if (priceOld != 0 && priceSale == 0) {
        html += `<span class="product-list__price">
         ${priceOld.toLocaleString("vi", {
             style: "currency",
             currency: "VND",
         })}
        </span>`;
    }

    if (priceOld != 0 && priceSale != 0) {
        html += `<span class="product-list__price">
         ${priceSale.toLocaleString("vi", {
             style: "currency",
             currency: "VND",
         })}
        </span>`;
    }

    return html;
}

function addCart(staturs = 0) {
    var cart_id = $("#cart_product_id").val();
    var cart_qty = $("#qty").val();

    $.ajax({
        type: "POST",
        url: "/cart-add",
        data: { cart_id, cart_qty },
        dataType: "JSON",
        success: function (response) {
            if (response.error == false) {
                if (staturs == 1) {
                    window.location.replace("/gio-hang.html");
                    return false;
                }
                if (confirm("Bạn có muốn vào giỏ hàng kiểm tra không?")) {
                    window.location.replace("/gio-hang.html");
                } else {
                    alert(response.message);
                    loadCart();
                }
            } else {
                alert(response.message);
            }
        },
    });
}

function loadCart() {
    $.ajax({
        type: "POST",
        url: "cart/qty",
        dataType: "JSON",
        success: function (response) {
            $(".header__cart-qty").text(response.qty);
        },
    });

    $.ajax({
        type: "POST",
        url: "cart/item",
        dataType: "JSON",
        success: function (response) {
            $("#header__cart__dropdown__2").html(response.data);
            $("#header__cart__dropdown__1").html(response.data);
        },
    });
}

function loadDetall(id = 0) {
    $.ajax({
        type: "POST",
        url: "/load-detall",
        data: { id },
        dataType: "JSON",
        success: function (response) {
            if (response.error == false) {
                renderDetall(response.data);

                setTimeout(() => {
                    $(".detall__modal").removeClass("oh");
                    $(".detall__modal__overlay").removeClass("oh");
                }, 200);
            } else {
                alert(response.message);
            }
        },
    });
}

function renderDetall(data) {
    $(".detall__container__add__qty-number").val(1);
    $("#cart_product_id").val(data.id);
    var img = `
        <div class="detall__container__slider__left">
        <ul class="detall__container__slider__left__list">
            <li
            class="detall__container__slider__left__list-item detall__container__slider__left__list-item--active"
            >
            <a
                class="detall__container__slider__left__list-link"
                href="javascript:void(0)"
            >
                <img
                src="${data.thumb}"
                alt=""
                class="detall__container__slider__left__list-image"
                />
            </a>
            </li>
            <li class="detall__container__slider__left__list-item">
            <a
                class="detall__container__slider__left__list-link"
                href="javascript:void(0)"
            >
                <img
                src="/template/images/ao1.jpg"
                alt=""
                class="detall__container__slider__left__list-image"
                />
            </a>
            </li>
        </ul>
        </div>
        <div class="detall__container__ima">
        <img
            src="${data.thumb}"
            alt=""
            class="detall__container__ima-image"
        />
        </div>`;
    $("#detall__container__image").html(img);

    var info = `
        <h1 class="detall__container__title">${data.title}</h1>
        <div class="detall__container__bar">
        <p class="detall__container__bar-name">
            Thương hiệu:
            <span class="detall__container__bar-txt">
            BASIC
            <span
                class="detall__container__bar-txt--icon product__bar-heading-icon"
            >
                R
            </span>
            </span>
        </p>
        <p class="detall__container__bar-name">
            Mã sản phẩm:
            <span class="detall__container__bar-txt"> ${
                data.product_code
            } </span>
        </p>
        </div>
        ${detallPrice(data.price, data.price_sale)}
        <div class="detall__container__size">
        <div class="detall__container__size-top">
            <h3 class="detall__container__heading">Kích thước</h3>
            <a href="" class="detall__container__size-top-link">
            Hướng dẫn chọn size
            </a>
        </div>
        <ul class="detall__container__size__list">
            <li class="detall__container__size__list-item">s</li>
            <li class="detall__container__size__list-item">m</li>
            <li class="detall__container__size__list-item">l</li>
            <li class="detall__container__size__list-item">xl</li>
        </ul>
        </div>
        <div class="detall__container__type">
        <h3 class="detall__container__heading">Màu sắc</h3>
        <span
            class="detall__container__type-color product-list__color"
            style="--product-color: ${data.product_color}"
        ></span>
        </div>
        
     
    </div>`;
    $("#detall__info").html(info);

    if (data.price == 0 && data.price_sale == 0) {
        $(".detall__container__add").remove();
    }
}

function detallPrice(priceOld = 0, priceSale = 0) {
    var html = "";

    if (priceOld == 0 && priceSale == 0) {
        html += `<a href="" class="detall__container__price">Liên Hệ</a>`;
    }

    if (priceOld != 0 && priceSale == 0) {
        html += `<span class="detall__container__price">
         ${priceOld.toLocaleString("vi", {
             style: "currency",
             currency: "VND",
         })}
        </span>`;
    }

    if (priceOld != 0 && priceSale != 0) {
        html += `<span class="detall__container__price">
         ${priceSale.toLocaleString("vi", {
             style: "currency",
             currency: "VND",
         })}
        </span>`;
    }

    return html;
}

function deleteCart(id = 0, staturs = 0) {
    if (id == 0) {
        return false;
    }

    $.ajax({
        type: "POST",
        url: "/cart-delete",
        data: { id },
        dataType: "JSON",
        success: function (response) {
            alert(response.message);
            $(".cart__id__" + id).remove();
            loadCart();

            var item = $(".cart__container__order__item");

            if (item.length == 0 && staturs == 1) {
                location.reload();
            }
        },
    });
}

let data = [];
$("#search").focus(function () {
    $.ajax({
        type: "GET",
        url: "/search",
        dataType: "JSON",
        success: function (response) {
            data = response.data;
        },
    });
});

$("#search").focusout(function () {
    setTimeout(() => {
        $(".search__main__dropdown").removeClass("os");
    }, 500);
});

$("#search").keyup(function () {
    $(".search__main__dropdown").addClass("os");
    var search = $(this).val();
    console.log(search.length);
    if (search.length == 0) {
        $(".search__main__dropdown").removeClass("os");
        return false;
    } else {
        $(".search__main__dropdown").addClass("os");
        var resuit = data.filter((row) => {
            return row.title.toUpperCase().includes(search.toUpperCase());
        });
        var html = searchs(resuit);
        $("#search__main__dropdown__item").html(html);
    }
});

function searchs(data) {
    var html = "";
    data.forEach((items) => {
        html += `
         <li class="search__main__dropdown-item">
            <a href="/?search=${items.title}" class="search__main__dropdown-text">${items.title}</a>
        </li>
        `;
    });

    return html;
}