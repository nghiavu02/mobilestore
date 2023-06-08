$(document).ready(function () {
    $('#customer-change-password').submit(function (e) {
        var pass_current = $('#password_current').val();
        var pass_new = $('#password_new').val();
        var pass_confirm = $('#password_confirm').val();
        if (pass_new !== pass_confirm) {
            $('.change-password-customer .error').html('Xác nhận mật khẩu mới không khớp !');
            $('.change-password-customer .error').css('display', 'block');
            e.preventDefault();
        } else if (pass_current === pass_new) {
            $('.change-password-customer .error').html('Mật khẩu cũ và mới giống nhau !');
            $('.change-password-customer .error').css('display', 'block');
            e.preventDefault();
        }
    })
});

