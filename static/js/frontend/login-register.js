// validate email user login, register before submit
$('.login-email').keyup(function () {
    $('#status-login').css('display', 'none');
    var l_email = $('.login-email').val();
    if (l_email.length > 0) {
        $('.login-error').css('display', 'block');
        if (!validateEmail(l_email)) {
            $('.login-error').html('Hãy điền email đúng định dạng !');
        } else {
            $('.login-error').html('');
            $.ajax({
                url: baseurl + 'user/searchEmail/' + $('.login-email').val(), // gửi ajax đến action
                type: 'get', // chọn phương thức gửi là get
                dateType: 'text', // dữ liệu trả về dạng text
                data: {},
                success: function (result) {
                    if ((result.length > 1) && (result.toLowerCase().trim() === $('.login-email').val().toLowerCase().trim())) {
                        $('#status-login').html('');
                        $('#status-login').css('display', 'none');
                    } else {
                        $('#status-login').css('display', 'block');
                        $('#status-login').html('Không tồn tại tài khoản !');
                    }
                }
            });
        }
    } else {
        $('.login-error').css('display', 'none');
    }
});
$('.reg-email').keyup(function () {
    var r_email = $('.reg-email').val();
    if (r_email.length > 0) {
        // scrollToAnchor('top-form-login');
        $('.login-error').css('display', 'block');
        if (!validateEmail(r_email)) {
            $('.login-error').html('Hãy điền email đúng định dạng !');
        } else {
            $('.login-error').html('');
        }
    } else {
        $('.login-error').css('display', 'none');
    }
});

$('.login-password').keyup(function () {
    if ($('.login-password').val().length > 0) {
        var check1 = false;
        var check2 = false;
        var check3 = false;
        var check4 = false;
        $('#notice').css('display', 'block');
        var lowerCaseLetters = /[a-z]/g;
        if ($('.login-password').val().match(lowerCaseLetters)) {
            $('#letter').removeClass('invalid');
            $('#letter').addClass('valid');
            check1 = true;
        } else {
            $('#letter').removeClass('valid');
            $('#letter').addClass('invalid');
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if ($('.login-password').val().match(upperCaseLetters)) {
            $('#capital').removeClass('invalid');
            $('#capital').addClass('valid');
            check2 = true;
        } else {
            $('#capital').removeClass('valid');
            $('#capital').addClass('invalid');
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if ($('.login-password').val().match(numbers)) {
            $('#number').removeClass('invalid');
            $('#number').addClass('valid');
            check3 = true;
        } else {
            $('#number').removeClass('valid');
            $('#number').addClass('invalid');
        }

        // Validate length
        if ($('.login-password').val().length >= 8) {
            $('#length').removeClass('invalid');
            $('#length').addClass('valid');
            check4 = true;
        } else {
            $('#length').removeClass('valid');
            $('#length').addClass('invalid');
        }
        if (check1 && check2 && check3 && check4) {
            $('#lp-valid').val('true');
        } else {
            $('#lp-valid').val('false');
        }
        if ($('#lp-valid').val() == 'true') {
            $('#notice').css('display', 'none');
        } else {
            // scrollToAnchor('top-form-login');
        }
    } else {
        $('#notice').css('display', 'none');
    }
});
$('.reg-password').keyup(function () {
    if ($('.reg-password').val().length > 0) {
        var check5 = false;
        var check6 = false;
        var check7 = false;
        var check8 = false;
        $('#notice').css('display', 'block');
        var lowerCaseLetters = /[a-z]/g;
        if ($('.reg-password').val().match(lowerCaseLetters)) {
            $('#letter').removeClass('invalid');
            $('#letter').addClass('valid');
            check5 = true;
        } else {
            $('#letter').removeClass('valid');
            $('#letter').addClass('invalid');
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if ($('.reg-password').val().match(upperCaseLetters)) {
            $('#capital').removeClass('invalid');
            $('#capital').addClass('valid');
            check6 = true;
        } else {
            $('#capital').removeClass('valid');
            $('#capital').addClass('invalid');
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if ($('.reg-password').val().match(numbers)) {
            $('#number').removeClass('invalid');
            $('#number').addClass('valid');
            check7 = true;
        } else {
            $('#number').removeClass('valid');
            $('#number').addClass('invalid');
        }

        // Validate length
        if ($('.reg-password').val().length >= 8) {
            $('#length').removeClass('invalid');
            $('#length').addClass('valid');
            check8 = true;
        } else {
            $('#length').removeClass('valid');
            $('#length').addClass('invalid');
        }
        if (check5 && check6 && check7 && check8) {
            $('#rp-valid').val('true');
        } else {
            $('#rp-valid').val('false');
        }
        if ($('#rp-valid').val() == 'true') {
            $('#notice').css('display', 'none');
        } else {
            // scrollToAnchor('top-form-login');
        }
    } else {
        $('#notice').css('display', 'none');
    }
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// Search exists email when user register new account
$('.reg-email').keyup(function () {
    $.ajax({
        url: baseurl + 'user/searchEmail/' + $('.reg-email').val(), // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if ((result.length > 1) && (result.toLowerCase().trim() === $('.reg-email').val().toLowerCase().trim())) {
                $('#search-email').css('display', 'block');
                $('#search-email').html('Email này đã được sử dụng !');
            } else {
                $('#search-email').html('');
                $('#search-email').css('display', 'none');
            }
        }
    });
});

// Check value of inputs when submit
$('#login-form').submit(function (e) {
    // Validate email
    var l_email = $('.login-email').val();
    if (!validateEmail(l_email)) {
        e.preventDefault();
    } else {
        if ($('#lp-valid').val() === 'false') {
            $('#notice').css('display', 'block');
            e.preventDefault();
        } else {
            $('#notice').css('display', 'none');
            if ($('#status-login').html() === 'Không tồn tại tài khoản !') {
                e.preventDefault();
            }
        }
    }
});
$('#register-form').submit(function (e) {
    // Validate email
    var r_email = $('.reg-email').val();
    if (!validateEmail(r_email)) {
        e.preventDefault();
    } else {
        if ($('#search-email').html() === 'Email này đã được sử dụng !') {
            e.preventDefault();
        } else {
            if ($('#rp-valid').val() === 'false') {
                $('#notice').css('display', 'block');
                e.preventDefault();
            } else {
                $('#notice').css('display', 'none');
            }
        }
    }
});

$('.message a').click(function () {
    $('.loginform form').animate(
        {
            height: 'toggle',
            opacity: 'toggle'
        },
        'slow'
    );
    $('#notice').css('display', 'none');
    $('#search-email').css('display', 'none');
    $('.login-error').css('display', 'none');
});

