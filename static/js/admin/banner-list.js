$(document).ready(function (e) {
    for (let i = 0; i < numberBanners; i++) {
        let stringVar = "visible".concat(i)
        if (eval(stringVar) == 1) {
            $('.cb-' + i).prop('checked', true);
        } else {
            $('.cb-' + i).prop('checked', false);
        }
    }
})

$('#formUpdageBanner').submit(function (e) {
    var countEmpty = 0;
    for (var j = 0; j < numberBanners; j++) {
        if ($('.cb-' + j).prop('checked') == true) {
            countEmpty += 1;
        } else {
            countEmpty += 0;
        }
    }
    if (countEmpty == 0) {
        e.preventDefault();
        alert('Banner homepage không được bỏ trống !');
    }
})

function deleteBanner(idBanner) {
    $.ajax({
        url: baseurlAdmin + 'banner/deleteBanner/' + idBanner, // gửi ajax đến action
        type: 'get', // chọn phương thức gửi là get
        dateType: 'text', // dữ liệu trả về dạng text
        data: {},
        success: function (result) {
        }
    });

}