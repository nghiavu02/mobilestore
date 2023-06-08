$(document).ready(function () {
    $('#nv-change-password').submit(function (e) {
        var _pass_current = $('#_password_current').val();
        var _pass_new = $('#_password_new').val();
        var _pass_confirm = $('#_password_confirm').val();
        console.log(_pass_current)
        console.log(_pass_new)
        console.log(_pass_confirm)
        if (_pass_new !== _pass_confirm) {
            $('#admin-change-pass ._error').html('Xác nhận mật khẩu mới không khớp !');
            $('#admin-change-pass ._error').css('display', 'block');
            e.preventDefault();
        } else if (_pass_current === _pass_new) {
            $('#admin-change-pass ._error').html('Mật khẩu cũ và mới giống nhau !');
            $('#admin-change-pass ._error').css('display', 'block');
            e.preventDefault();
        }
    })
});
