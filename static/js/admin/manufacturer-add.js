$('.nameManufacturer').keyup(function () {
    $.ajax({
        url: baseurlAdmin + 'manufacturer/searchName/' + $('.nameManufacturer').val(), // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if ((result.length > 1) && (result.toLowerCase().trim() === $('.nameManufacturer').val().toLowerCase().trim())) {
                $('.searchManufacturer').css('display', 'block');
                $('.searchManufacturer').html('Đã tồn tại nhà sản xuất !');
            } else {
                $('.searchManufacturer').html('');
                $('.searchManufacturer').css('display', 'none');
            }
        }
    });
})

$('#addManufacturer').submit(function (e) {
    if ($('.searchManufacturer').html() === 'Đã tồn tại nhà sản xuất !') {
        e.preventDefault();
    }

})