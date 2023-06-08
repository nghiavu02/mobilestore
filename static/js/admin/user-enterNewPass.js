$(document).ready(function () {
    $('#fa-changeNewPass').submit(function (e) {
        var fa_passNew = $('#fa-newpass').val();
        var fa_passConfirm = $('#fa-confirmpass').val();
        if (fa_passNew !== fa_passConfirm) {
            $('.fa-new-pass .note-password').html('Hai mật khẩu không khớp nhau !');
            $('.fa-new-pass .note-password').css('display', 'block');
            e.preventDefault();
        }
    })
});