$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function loadProductList(id, menuId, name) {
    $.ajax({
        type: "POST",
        url: "/load-product-list",
        data: { id },
        dataType: "JSON",
        success: function (resuit) {
            var html = "";
            if (resuit.error == false) {
                if (resuit.data.length != 0) {
                    html += rederItemProduct(resuit.data);
                    var link = `
                            <a href="/danh-sach/${id}-ao-khoac.html" class="btb product__bottom-link">
                                Xem tất cả <i class="fa-solid fa-chevron-right"></i>
                            </a>
                    `;

                    $("#product__is__emty__" + menuId).addClass("oh");
                    $("#product-list__" + menuId).removeClass("oh");
                    $("#product-list__" + menuId).html(html);

                    $("#product__bottom__" + menuId).removeClass("oh");
                    $("#product__bottom__" + menuId).html(link);
                } else {
                    $("#product-list__" + menuId).addClass("oh");
                    $("#product__bottom__" + menuId).addClass("oh");
                    $("#product__is__emty__" + menuId).removeClass("oh");
                }
            } else {
                alert(resuit.message);
            }
        },
    });

    // load menu lại/reset menu
    loadMenu(menuId, id);
}

function rederItemProduct(data) {
    var html = "";
    data.forEach(function (row, key) {
        html += `
            <li class="product-list__item">
                <div class="product-list__ima">
                    <img src="${
                        row["thumb"]
                    }" alt="SHOPBASIC io vn" class="product-list__image">

                    <img src="/template/images/logo.jpg" alt="SHOPBASIC io vn" class="product-list__logo">

                    <div class="product-list__active">
                    <a href="/san-pham/${
                        row["slug_url"]
                    }.html" class="product-list__active-link">
                         <i class="fas fa-sliders-h"></i>
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

    return html;
}

function loadMenu(menuId, id) {
    var title = "";

    $.ajax({
        type: "POST",
        url: "/load-menu-first",
        data: { id, menu_id: menuId },
        dataType: "JSON",
        success: function (response) {
            var item = "";
            if (response.error == false) {
                response.data.forEach((row) => {
                    if (row.id != id) {
                        item += `<li class="product__select__list-item" id="link__id__${row.id}">
                                    <span onclick="loadProductList(${row.id}, ${menuId}, ' ${row.name}')" class="product__select__list-link product__select__list-link--active">
                                        ${row.name}
                                        <span class="product__bar-heading-icon">R</span>
                                    </span>
                                </li>`;
                    }

                    if (row.id == id) {
                        title += row.name;
                    }
                });

                $("#product__bar__h2__" + menuId).text(title);
                $("#product__select__list__" + menuId).html(item);
            }
        },
    });
}

function price(priceOld = 0, priceSale = 0) {
    var html = "";

    if (priceOld == 0 && priceSale == 0) {
        html += `<a href="/lien-he.html" class="product-list__price">Liên Hệ</a>`;
    }

    if (priceOld != 0 && priceSale == 0) {
        html += `<span class="product-list__price">
              ${convertPrice(priceOld)}
        </span>`;
    }

    if (priceOld != 0 && priceSale != 0) {
        html += `<span class="product-list__price">
             ${convertPrice(priceSale)}
        </span>`;
    }

    return html;
}

function addCart(staturs = 0) {
    var cart_id = $("#cart_product_id").val();
    var cart_qty = $("#qty").val();
    if (cart_id == 0) {
        alert(
            "sản phẩm này bạn không thể thêm vào giỏ được xin vui lòng liên hệ với shop"
        );
        $(".detall__container__add").addClass("oh");
        return false;
    }

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

                $(".message__addcart__overlay").removeClass("oh");
                $(".message__addcart").removeClass("oh");
                $(".detall__modal__overlay").addClass("oh");
                $(".detall__modal").addClass("oh");
            } else {
                alert(response.message);
            }
        },
    });
}

function addCartAlert(status = 0) {
    $(".message__addcart__overlay").addClass("oh");
    $(".message__addcart").addClass("oh");

    if (status == 1) {
        loadCartQty();
        window.location = "/gio-hang.html";
    } else {
        loadCart();
    }
}

$("#active__cart__view").click(() => {
    addCartAlert(1);
});

$(".addcart__close").click(() => {
    addCartAlert();
});

function loadCart() {
    // qty
    loadCartQty();

    // reder html cart
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

function loadCartQty() {
    $.ajax({
        type: "POST",
        url: "cart/qty",
        dataType: "JSON",
        success: function (response) {
            $(".header__cart-qty").text(response.qty);
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
                renderDetall(response.success.data, response.success.sliders);

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

function renderDetall(data, sliders = []) {
    var productId = data.price == 0 && data.price_sale == 0 ? 0 : data.id;

    $(".detall__container__add__qty-number").val(1);
    $("#cart_product_id").val(productId);

    var img = `
        <div class="detall__container__slider__left">
        <ul class="detall__container__slider__left__list">
            <li
            class="detall__container__slider__left__list-item detall__container__slider__left__list-item--active"
           onclick="productSlider('${data.thumb}', 0)" >
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
            </li>`;

    sliders.forEach((slider, index) => {
        img += `
                <li class="detall__container__slider__left__list-item"
                onclick="productSlider('${slider.thumb}', ${index + 1})">
                <a
                    class="detall__container__slider__left__list-link"
                    href="javascript:void(0)"
                >
                    <img
                    src="${slider.thumb}"
                    alt=""
                    class="detall__container__slider__left__list-image"
                    />
                </a>
                </li>`;
    });

    img += `
        </ul>
        </div>
        <div class="detall__container__ima" id="detail__img__id">
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
        $(".detall__container__add").addClass("oh");
    } else {
        $(".detall__container__add").removeClass("oh");
    }
}

function detallPrice(priceOld = 0, priceSale = 0) {
    var html = "";

    if (priceOld == 0 && priceSale == 0) {
        html += `<a href="" class="detall__container__price">Liên Hệ</a>`;
    }

    if (priceOld != 0 && priceSale == 0) {
        html += `<span class="detall__container__price">
              ${convertPrice(priceOld)}
        </span>`;
    }

    if (priceOld != 0 && priceSale != 0) {
        html += `<span class="detall__container__price">
             ${convertPrice(priceSale)}
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

function convertPrice(price) {
    return Intl.NumberFormat("de-DE", {
        style: "currency",
        currency: "VND",
    }).format(price);
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

$("#filter_product").change(function () {
    var num = $(this).val();

    $.ajax({
        type: "POST",
        url: "product-select",
        data: { num },
        dataType: "JSON",
        success: function (response) {
            var html = rederItemProduct(response.data);

            $("#product_item_add").html(html);
        },
    });
});

function CartUpdateQty(id, action = 1) {
    var qtyNumber = $("#qty_number_id_" + id).val();

    if (action == 1) {
        qtyNumber++;
    } else {
        qtyNumber--;
    }
    if (qtyNumber.length != 0) {
        $.ajax({
            type: "POST",
            url: "cart-update-qty",
            data: {
                cart_id: id,
                cart_qty: qtyNumber,
            },
            dataType: "JSON",
            success: function (response) {
                if (response.error == false) {
                    $("#order__price_" + id).html(response.data.price_total);
                    $("#order__sumall").html(response.data.total);
                    $("#qty_number_id_" + id).val(response.data.qty);
                }
            },
        });
    } else {
        $("#qty_number_id_" + id).val(0);
    }
}

function productSlider(url, key) {
    const img = ` <img src="${url}" alt="shopbasic" class="detall__container__ima-image">`;
    const items = document.querySelectorAll(
        ".detall__container__slider__left__list-item"
    );

    items.forEach((item, index) => {
        if (index != key) {
            item.classList.remove(
                "detall__container__slider__left__list-item--active"
            );
        } else {
            items[key].classList.add(
                "detall__container__slider__left__list-item--active"
            );
        }
    });

    $("#detail__img__id").html(img);
}
