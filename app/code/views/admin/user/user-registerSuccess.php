<?php
$status = null;
if ($result['status'] === '1') {
    $status = "Đã kích hoạt";
} else if ($result['status'] === '0') {
    $status = "Chưa kích hoạt";
} else {
    $status = "Bị vô hiệu hóa";
}
?>
<div id="register-success">
    <h4>
        Tạo tài khoản thành công !
    </h4>
    <div class="info-account">
        <table class="table">
            <tr>
                <th>Họ và tên:</th>
                <td><?php echo $result['tenNhanVien']; ?></td>
            </tr>
            <tr>
                <th>Địa chỉ email:</th>
                <td><?php echo $result['email']; ?></td>
            </tr>
            <tr>
                <th>Mật khẩu mặc định:</th>
                <td>MobileShop123</td>
            </tr>
            <tr>
                <th>Giới tính:</th>
                <td><?php echo $result['gioiTinh']; ?></td>
            </tr>
            <tr>
                <th>Ngày sinh:</th>
                <td><?php echo $result['ngaySinh']; ?></td>
            </tr>
            <tr>
                <th>Quê quán:</th>
                <td><?php echo $result['queQuan']; ?></td>
            </tr>
            <tr>
                <th>Chứng minh nhân dân:</th>
                <td><?php echo $result['cmnd']; ?></td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td><?php echo $result['soDienThoai']; ?></td>
            </tr>
            <tr>
                <th>Chức vụ:</th>
                <td><?php echo $result['chucvu']; ?></td>
            </tr>
            <tr>
                <th>Ghi chú:</th>
                <td><?php echo $result['ghiChu']; ?></td>
            </tr>
            <tr>
                <th>Trạng thái tài khoản:</th>
                <td><?php echo $status; ?></td>
            </tr>
        </table>
    </div>
</div>
