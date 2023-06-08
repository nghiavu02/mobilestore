function cancelEditAccount() {
    window.location = baseurlAdmin + controller + '/index/' + idUser;
}

$(document).ready(function (e) {
    if (typeof (email) !== 'undefined') {
        $('#ten').val(name);
        $('#email').val(email);
        $('#gioitinh').val(sex);
        $('#ngaysinh').val(birthday);
        $('#quequan').val(address);
        $('#cmnd').val(cmnd);
        $('#dienthoai').val(phone);
        $('#chucvu').val(role);
        $('#ghichu').val(note);
        $('#trangthai').val(status);
    }
})