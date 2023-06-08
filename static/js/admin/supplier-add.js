$('.nameSupplier').keyup(function () {
    $.ajax({
        url: baseurlAdmin + 'Supplier/searchName/' + $('.nameSupplier').val(), // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if ((result.length > 1) && (result.toLowerCase().trim() === $('.nameSupplier').val().toLowerCase().trim())) {
                $('.searchSupplier').css('display', 'block');
                $('.searchSupplier').html('Đã tồn tại nhà cung cấp !');
            } else {
                $('.searchSupplier').html('');
                $('.searchSupplier').css('display', 'none');
            }
        }
    });
})

$('#addSupplier').submit(function (e) {
    if ($('.searchSupplier').html() === 'Đã tồn tại nhà cung cấp !') {
        e.preventDefault();
    }

})