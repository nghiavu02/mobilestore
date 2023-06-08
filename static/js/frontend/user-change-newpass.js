$(document).ready(function () {
    $('#changeNewPass').submit(function (e) {
        var f_passNew = $('#f-newpass').val();
        var f_passConfirm = $('#f-confirmpass').val();
        if (f_passNew !== f_passConfirm) {
            $('.new-pass .note-password').html('Hai mật khẩu không khớp nhau !');
            $('.new-pass .note-password').css('display', 'block');
            e.preventDefault();
        }
    })
});

