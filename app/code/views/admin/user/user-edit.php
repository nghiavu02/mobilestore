<?php
switch ($employee['chucvu']) {
    case "Quản trị viên":
        $controller = "admin";
        break;
    case "Nhân viên bán hàng":
        $controller = "seller";
        break;
    case "Nhân viên thủ kho":
        $controller = "stocker";
        break;
    case "Nhân viên giao hàng":
        $controller = "shipper";
        break;
}
switch ($employee['status']) {
    case 1:
        $status = "Đã kích hoạt";
        break;
    case 0:
        $status = "Chưa kích hoạt";
        break;
    case 2:
        $status = "Bị vô hiệu hóa";
        break;

}
if (getAction() === "edit") {
    echo "<script type='text/javascript'>
        var controller = '" . getModule() . "';
        var idUser = '" . $employee['idNhanVien'] . "';
        var name = '" . $employee['tenNhanVien'] . "';
        var email = '" . $employee['email'] . "';
        var sex = '" . $employee['gioiTinh'] . "';
        var birthday = '" . $employee['ngaySinh'] . "';
        var address = '" . $employee['queQuan'] . "';
        var cmnd = '" . $employee['cmnd'] . "';
        var phone = '" . $employee['soDienThoai'] . "';
        var role = '" . $employee['chucvu'] . "';
        var note = '" . $employee['ghiChu'] . "';
        var status = '" . $status . "';
    </script>";
}

?>

<div id="edit-account">
    <h4>Chỉnh sửa thông tin tài khoản nhân viên:</h4>
    <form id="updateAdminAccount" method="post" action="<?php echo baseUrl('user/updateAccount'); ?>">
        <input type="hidden" name="idNV" value="<?php echo $employee['idNhanVien']; ?>">
        <input type="hidden" name="controller" value="<?php echo $controller; ?>">
        <table class="table">
            <tr>
                <th>Tên người dùng:</th>
                <td><input id="ten" type="text" name="edit-username" required placeholder="name" autocomplete="off">
                </td>
            </tr>
            <tr>
                <th>Tài khoản email:</th>
                <td>
                    <input readonly
                           id="email" type="email" name="edit-email" required placeholder="email"
                           autocomplete="off">
                    <div id="search-email">
                </td>
            </tr>
            <tr>
                <th>Giới tính:</th>
                <td>
                    <select name="edit-gioitinh" id="gioitinh">
                        <option>Nam</option>
                        <option>Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ngày sinh:</th>
                <td>
                    <input id="ngaysinh" type="date" name="edit-ngaysinh" required/>
                </td>
            </tr>
            <tr>
                <th>Quê quán:</th>
                <td>
                    <input id="quequan" type="text" name="edit-address" required placeholder="address"
                           autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Chứng minh nhân dân:</th>
                <td>
                    <input id="cmnd" type="number" name="edit-cmnd" required placeholder="cmnd" autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td>
                    <input id="dienthoai" type="number" name="edit-phone" required placeholder="phone"
                           autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Chức vụ:</th>
                <td>
                    <select name="edit-chucvu" id="chucvu">
                        <option>Quản trị viên</option>
                        <option>Nhân viên bán hàng</option>
                        <option>Nhân viên thủ kho</option>
                        <option>Nhân viên giao hàng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ghi chú:</th>
                <td>
                    <input id="ghichu" type="text" name="edit-ghichu" required placeholder="note" autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Trạng thái tài khoản:</th>
                <td>
                    <select name="edit-status" id="trangthai">
                        <option>Đã kích hoạt</option>
                        <option>Chưa kích hoạt</option>
                        <option>Bị vô hiệu hóa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button type="submit" class="btn btn-success">
                        Lưu thông tin
                    </button>
                    <button type="button" class="btn btn-danger" onclick="cancelEditAccount()">
                        Hủy bỏ
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>
