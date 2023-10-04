$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function deleteRow(url, id) {
    if (confirm("Lưu ý, khi xóa không thể khôi phục")) {
        $.ajax({
            type: "DELETE",
            url: url,
            data: { id },
            dataType: "JSON",
            success: function (response) {
                if (response.error == false) {
                    $(".main__alert").removeClass("oh");
                    $(".main__alert").html(response.message);

                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                } else {
                    alert("vui lòng thử lại sau");
                }
            },
        });
    }
}
$("#title").keyup(function () {
    var link = $(this).val();

    var url = toSlug(link);

    $("#slug_title").val(url);
});
$("#title").focusout(function () {
    var url = $("#slug_title").val();

    $.ajax({
        type: "POST",
        url: "/admin/product/slug",
        data: { url },
        dataType: "JSON",
        success: function (response) {
            $("#slug_title").val(response.slug);
        },
    });
});

function toSlug(str) {
    var slug = str.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
    slug = slug.replace(/đ/gi, "d");
    slug = slug.replace(
        /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
        ""
    );

    slug = slug.replace(/ /gi, "-");

    slug = slug.replace(/\-\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-/gi, "-");
    slug = slug.replace(/\-\-/gi, "-");
    slug = "@" + slug + "@";
    slug = slug.replace(/\@\-|\-\@|\@/gi, "");
    return slug;
}
$("#upload_file").change(function () {
    var formData = new FormData();
    formData.append("file", $(this)[0].files[0]);

    $.ajax({
        url: "/admin/upload-file",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.error == false) {
                $("#url_image").val(data.url);

                var html = `<img src="${data.url}" alt="" class="main__avatar__image">`;
                $(".main__avatar").html(html);
            } else {
                alert("upload không thành công");
            }
        },
    });
});

function headPrice() {
    var priceOld = parseInt($("#price_old").val());
    var priceSale = parseInt($("#price_sale").val());

    if (priceOld < priceSale) {
        $(".main__alert").removeClass("alert-success");
        $(".main__alert").removeClass("oh");
        $(".js__hide").addClass("oh");
        $(".main__alert").addClass("alert-danger");
        $(".main__alert").html("Giá giảm nhỏ hơn giá gốc ");
    } else {
        $(".main__alert").addClass("oh");
        $(".js__hide").removeClass("oh");
    }
}
$("#price_old").keyup(function () {
    headPrice();
});
$("#price_sale").keyup(function () {
    headPrice();
});
