function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

$('#login-email').keyup(function (e) {
    $.ajax({
        url: baseurlAdmin + 'user/searchEmail/' + $('#login-email').val(), // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if (($('#login-email').val().length === 0) || (result.toLowerCase().trim() === $('#login-email').val().toLowerCase().trim())) {
                $('#status-email').html('');
                $('#status-email').css('display', 'none');
            } else {
                $('#status-email').css('display', 'block');
                $('#status-email').html('Không tồn tại tài khoản !');
            }
        }
    });
})

$('#admin-login').submit(function (e) {
    if ($('#status-email').html() === 'Không tồn tại tài khoản !') {
        e.preventDefault();
    }
})