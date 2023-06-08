$(document).ready(function () {
    $(document).mousemove(function () {
        /* style when hover HANG-SAN-XUAT*/
        if ($('.hover1:hover').length > 0) {
            $('.hover-container1').css('display', 'block');
        }
        if (!($('.hover1:hover').length > 0) && !($('.hover-container1:hover').length > 0)) {
            $('.hover-container1').css('display', 'none');
        }
        /* style when hover MUC GIA*/
        if ($('.hover2:hover').length > 0) {
            $('.hover-container2').css('display', 'block');
        }
        if (!($('.hover2:hover').length > 0) && !($('.hover-container2:hover').length > 0)) {
            $('.hover-container2').css('display', 'none');
        }
    });
    updateCountCart();
    updateCountWishlist();
});

function addToCart(idMobile) {
    $.ajax({
        url: baseurl + 'user/addToCart/' + idMobile, // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if (result.length >= 1) {
                if (result.trim() === '0') {
                    $('#error').html('Sản phẩm đã tồn tại trong giỏ hàng của bạn !');
                    $('.error').css('display', 'block');
                    setTimeout(function () {
                        $('.error').css('display', 'none');
                    }, 1500)
                } else if (result.trim() === '1') {
                    updateCountCart();
                    $('body .home-page').css('opacity', '0.7');
                    $('.home-page .loading').css('display', 'block');
                    setTimeout(function () {
                            $('body .home-page').css('opacity', '1');
                            $('.home-page .loading').css('display', 'none');
                            $('#success').html('Thêm sản phẩm vào giỏ hàng thành công !');
                            $('.success').css('display', 'block');
                            setTimeout(function () {
                                    $('.success').css('display', 'none');
                                },
                                1500
                            );
                        },
                        1500
                    );
                }
            }
        }
    });
}

function addToWishList(idMobile) {
    $.ajax({
        url: baseurl + 'user/addToWishList/' + idMobile, // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if (result.length >= 1) {
                if (result.trim() === '0') {
                    $('#error').html('Sản phẩm đã tồn tại trong danh mục yêu thích của bạn !');
                    $('.error').css('display', 'block');
                    setTimeout(function () {
                        $('.error').css('display', 'none');
                    }, 1500)
                } else if (result.trim() === '1') {
                    updateCountWishlist();
                    $('body .home-page').css('opacity', '0.7');
                    $('.home-page .loading').css('display', 'block');
                    setTimeout(function () {
                            $('body .home-page').css('opacity', '1');
                            $('.home-page .loading').css('display', 'none');
                            $('#success').html('Thêm sản phẩm vào danh mục yêu thích thành công !');
                            $('.success').css('display', 'block');
                            setTimeout(function () {
                                    $('.success').css('display', 'none');
                                },
                                1500
                            );
                        },
                        1500
                    );
                }
            }
        }
    });
}

function deleteItemWishlist(idMobile) {
    $.ajax({
        url: baseurl + 'user/deleteItemWishlist/' + idMobile, // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if (result.length >= 1) {
                if (result.trim() === '0') {
                    $('#error').html('Xóa thất bại !');
                    $('.error').css('display', 'block');
                    setTimeout(function () {
                        $('.error').css('display', 'none');
                    }, 2000)
                } else if (result.trim() === '1') {
                    updateCountWishlist();
                    $('#success').html('Xóa thành công !');
                    $('.item-wl-' + idMobile).remove();
                    $('.success').css('display', 'block');
                    setTimeout(function () {
                        $('.success').css('display', 'none');
                    }, 1000)
                }
            }
        }
    });
}

function updateCountWishlist() {
    $.ajax({
        url: baseurl + 'user/updateCountWishlist/', // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            setTimeout(function () {
                    $('#wcount').html("(" + result.trim() + ")");
                },
                800
            );
        }
    });
}

function updateCountCart() {
    $.ajax({
        url: baseurl + 'user/updateCountCart/', // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            setTimeout(function () {
                    $('#ccount').html("(" + result.trim() + ")");
                },
                800
            );
        }
    });
}

function scrollToAnchor(aid) {
    var aTag = $("a[name='" + aid + "']");
    $('html,body').animate({scrollTop: aTag.offset().top}, 2000);
}