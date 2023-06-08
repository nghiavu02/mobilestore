// Giam so luong cua chi tiet gio hang co idMobile duoc truyen vao (giam so luong 1 hang trong gio hang)
function reduceCount(idMobile) {
    var oldCount = parseInt($('.item-' + idMobile).html());
    var newCount = (oldCount > 1) ? (oldCount - 1) : 1;
    $('.item-' + idMobile).html(newCount);
}

// Tang so luong cua chi tiet gio hang co idMobile duoc truyen vao (tang so luong 1 hang trong gio hang)
function increaseCount(idMobile) {
    var oldCount = parseInt($('.item-' + idMobile).html());
    var newCount = oldCount + 1;
    $('.item-' + idMobile).html(newCount);
}

function updateGlobalCart() {
    var items = $('.idItemCart');
    var numberItems = items.length;
    for (let i = 0; i < numberItems; i++) {
        let idCartItem = parseInt(items[i].innerHTML);
        let newCountItem = parseInt($('.item-' + idCartItem)[0].innerHTML);
        $.ajax({
            url: baseurl + 'cart/updateItemCart/' + idCartItem + '/' + newCountItem, // gửi ajax đến action
            type: 'get', // chọn phương thức gửi là get
            dateType: 'text', // dữ liệu trả về dạng text
            data: {},
            success: function (result) {
            }
        });
    }
    $('body .home-page').css('opacity', '0.7');
    $('.home-page .loading').css('display', 'block');
    setTimeout(function () {
            $('body .home-page').css('opacity', '1');
            $('.home-page .loading').css('display', 'none');
            $('#success').html('Cập nhật giỏ hàng thành công !');
            $('.success').css('display', 'block');
            setTimeout(function () {
                    $('.success').css('display', 'none');
                    window.location = baseurl + 'user/cart';
                },
                800
            );
        },
        800
    );
}

function deleteItemCart(idDetail) {
    $.ajax({
        url: baseurl + 'user/deleteItemCart/' + idDetail, // gửi ajax đến action
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
                    updateCountCart();
                    $('body .home-page').css('opacity', '0.7');
                    $('.home-page .loading').css('display', 'block');
                    setTimeout(function () {
                            $('body .home-page').css('opacity', '1');
                            $('.home-page .loading').css('display', 'none');
                            $('#success').html('Xóa thành công !');
                            $('.item-wc-' + idDetail).remove();
                            $('.success').css('display', 'block');
                            setTimeout(function () {
                                    $('.success').css('display', 'none');
                                    $('.updateGioHang').click();
                                },
                                1000
                            );
                        },
                        1000
                    );
                }
            }
        }
    });
}