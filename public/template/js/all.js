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
                }
            } else {
                alert(response.message);
            }
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
                var html = renderDetall(response.data);
                $(".detall__modal__html").html(html);
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
    var html = `
        <div class="detall__modal__wrapper">
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
        </div>
    </div>
    <div class="detall__modal__wrapper">
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
        
        <div class="detall__container__add">
        <div class="detall__container__add__qty">
            <a href="javacript:void(0)" class="detall__container__add__qty-btn btn minu">
            <i class="fas fa-minus"></i>
            </a>
            <input
            type="number"
            value="1"
            class="detall__container__add__qty-number"
            id="qty"
            />
            <a href="javacript:void(0)" class="detall__container__add__qty-btn btn plug">
            <i class="fas fa-plus"></i>
            </a>
        </div>
        <input type="text" class="oh" id="cart_product_id" value="${data.id}">
        <button class="btn detall__container__add__btn" onClick="addCart()">
            THÊM VÀO GIỞ HÀNG
        </button>
        </div>
    </div>`;

    return html;
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

function deleteCart(id = 0) {
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
            $("#cart__id__" + id).remove();
            $("#cart__dropdown__" + id).remove();

            setTimeout(() => {
                location.reload();
            }, 300);
        },
    });
}

let data = [];
$("#search").focus(function () {
    $(".search__main__dropdown").show();
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
        $(".search__main__dropdown").hide();
    }, 500);
});

$("#search").keyup(function () {
    var search = $(this).val();

    if (search == "") {
        $(".search__main__dropdown").addClass("oh");
    } else {
        var resuit = data.filter((row) => {
            return row.title.toUpperCase().includes(search.toUpperCase());
        });
        var html = searchs(resuit);
        $("#search__main__dropdown").html(html);
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
