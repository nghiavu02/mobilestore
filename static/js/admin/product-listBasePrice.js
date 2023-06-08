$(document).ready(function (e) {
    for (let i = 0; i < numberBasePrice; i++) {
        let stringVar = "visibleOnHome".concat(i)
        if (eval(stringVar) == 1) {
            $('.cb-' + i).prop('checked', true);
        } else {
            $('.cb-' + i).prop('checked', false);
        }
    }
})

$('#formUpdageBasePrice').submit(function (e) {
    var countEmpty = 0;
    for (var j = 0; j < numberBasePrice; j++) {
        if ($('.cb-' + j).prop('checked') == true) {
            countEmpty += 1;
        } else {
            countEmpty += 0;
        }
    }
    if (countEmpty == 0) {
        e.preventDefault();
        alert('Sản phẩm giá sốc homepage không được bỏ trống !');
    }
})