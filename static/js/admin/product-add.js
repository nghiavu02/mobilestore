// Kiem tra anh logo, kich thuoc 600x600
function validateLogo(ctrl) {
    var fileUpload = ctrl;
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpeg|.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof (fileUpload.files) != "undefined") {
            var reader = new FileReader();
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height == 600 && width == 600) {
                        // alert("Ảnh hợp lệ.");
                        return true;
                    } else {
                        fileUpload.value = null;
                        alert("Ảnh không đúng kích thước 600 x 600 !");
                        return false;
                    }
                };
            }
        } else {
            alert("Trình duyệt của bạn không hỗ trợ HTML5.");
            return false;
        }
    } else {
        alert("Hãy chọn đúng định dạng file ảnh.");
        return false;
    }
}

// Kiem tra file anh phu, kich thuoc 1200x680
function validateImg(ctrl) {
    var fileUpload = ctrl;
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpeg|.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof (fileUpload.files) != "undefined") {
            var reader = new FileReader();
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height == 680 && width == 1020) {
                        // alert("Ảnh hợp lệ.");
                        return true;
                    } else {
                        fileUpload.value = null;
                        alert("Ảnh không đúng kích thước 1020 x 680 !");
                        return false;
                    }
                };
            }
        } else {
            alert("Trình duyệt của bạn không hỗ trợ HTML5.");
            return false;
        }
    } else {
        alert("Hãy chọn đúng định dạng file ảnh.");
        return false;
    }
}

$('.namePhone').keyup(function () {
    $.ajax({
        url: baseurlAdmin + 'product/searchName/' + $('.namePhone').val(), // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
            if ((result.length > 1) && (result.toLowerCase().trim() === $('.namePhone').val().toLowerCase().trim())) {
                $('.searchProduct').css('display', 'block');
                $('.searchProduct').html('Đã tồn tại sản phẩm !');
            } else {
                $('.searchProduct').html('');
                $('.searchProduct').css('display', 'none');
            }
        }
    });
})

$('#addProduct').submit(function (e) {
    if ($('.searchProduct').html() === 'Đã tồn tại sản phẩm !') {
        e.preventDefault();
    }
    var giaNhap = parseInt($('.giaNhap').val());
    var giaBan = parseInt($('.giaBan').val());
    var giamGia = parseInt($('.giamGia').val());
    if (giaNhap <= 0 || giaBan <= 0 || giamGia < 0) {
        e.preventDefault();
        alert('Giá cả phải là số dương !');
    }
    if (giamGia > giaBan) {
        e.preventDefault();
        alert('Giảm giá phải nhỏ hơn giá bán !');
    }

})