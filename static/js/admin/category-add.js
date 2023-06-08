$('.nameCategory').keyup(function () {
    $.ajax({
        url: baseurlAdmin + 'category/searchName/' + $('.nameCategory').val(), // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if ((result.length > 1) && (result.toLowerCase().trim() === $('.nameCategory').val().toLowerCase().trim())) {
                $('.searchCategory').css('display', 'block');
                $('.searchCategory').html('Đã tồn tại thể loại này !');
            } else {
                $('.searchCategory').html('');
                $('.searchCategory').css('display', 'none');
            }
        }
    });
})

$('#addCategory').submit(function (e) {
    if ($('.searchCategory').html() === 'Đã tồn tại thể loại này !') {
        e.preventDefault();
    }
})