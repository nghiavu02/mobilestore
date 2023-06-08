$(document).ready(function () {
    // load user information data on inputs
    $('.user-edit-name').val(userName);
    $('.user-edit-phone').val(userPhone);
    $('.user-edit-address').val(userAddress);
    $('#change-customer-info').submit(function (e) {
        if (($('.user-edit-name').val() === userName) &&
            ($('.user-edit-phone').val() === userPhone) &&
            ($('.user-edit-address').val() === userAddress)
        ) {
            $('.user-information .error').html('Bạn chưa thay đổi gì cả !');
            $('.user-information .error').css('display', 'block');
            e.preventDefault();
        } else {
            if ($('.user-edit-name').val().length === 0) {
                $('.user-information .error').html('Tên của bạn không được bỏ trống !');
                $('.user-information .error').css('display', 'block');
                e.preventDefault();
            } else if ($('.user-edit-phone').val().length === 0) {
                $('.user-information .error').html('Số điện thoại không được bỏ trống !');
                $('.user-information .error').css('display', 'block');
                e.preventDefault();
            } else if ($('.user-edit-address').val().length === 0) {
                $('.user-information .error').html('Địa chỉ không được bỏ trống !');
                $('.user-information .error').css('display', 'block');
                e.preventDefault();
            } else {
                $('.user-information .error').css('display', 'none');
            }
        }
    });
});

