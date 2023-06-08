$(document).ready(function (e) {
    $('#createAdminAccount')[0].reset();
});

function cancelCreateAccount() {
    window.location = baseurlAdmin;
}

// Search exists email when user register new account
$('#r-email').keyup(function () {
    $.ajax({
        url: baseurlAdmin + 'user/searchEmail/' + $('#r-email').val(), // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if ((result.length > 1) && (result.toLowerCase().trim() === $('#r-email').val().toLowerCase().trim())) {
                $('#search-email').css('display', 'block');
                $('#search-email').html('Email này đã được sử dụng !');
            } else {
                $('#search-email').html('');
                $('#search-email').css('display', 'none');
            }
        }
    });
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

$('#createAdminAccount').submit(function (e) {
    // Validate email
    var r_email = $('#r-email').val();
    if (!validateEmail(r_email)) {
        e.preventDefault();
    } else {
        if ($('#search-email').html() === 'Email này đã được sử dụng !') {
            e.preventDefault();
        }
    }
});

function resetForm() {
    $('#createAdminAccount')[0].reset();
}