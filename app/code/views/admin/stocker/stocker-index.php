<?php
switch ($stocker['status']) {
    case 2:
        $status = "Bị vô hiệu hóa";
        break;
    case 0 :
        $status = "Chưa kích hoạt";
        break;
    case 1:
        $status = "Đã kích hoạt";
        break;
}
?>
<div class="stocker-info">
    <h4>
        Thông tin chi tiết nhân viên thủ kho
    </h4>
    <div class="success">
        <?php echo(isset($_SESSION['successUpdateNVInfo']) ? $_SESSION['successUpdateNVInfo'] : ''); ?>
    </div>
    <div class="fail">
        <?php echo(isset($_SESSION['failUpdateNVInfo']) ? $_SESSION['failUpdateNVInfo'] : ''); ?>
    </div>
    <table class="table">
        <tr>
            <td>Họ và tên:</td>
            <th><?php echo $stocker['tenNhanVien']; ?></th>
        </tr>
        <tr>
            <td>Giới tính:</td>
            <th><?php echo $stocker['gioiTinh']; ?></th>
        </tr>
        <tr>
            <td>Ngày sinh:</td>
            <th><?php echo $stocker['ngaySinh']; ?></th>
        </tr>
        <tr>
            <td>Quê quán:</td>
            <th><?php echo $stocker['queQuan']; ?></th>
        </tr>
        <tr>
            <td>Chứng minh nhân dân:</td>
            <th><?php echo $stocker['cmnd']; ?></th>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <th><?php echo $stocker['soDienThoai']; ?></th>
        </tr>
        <tr>
            <td>Chức vụ:</td>
            <th><?php echo $stocker['chucvu']; ?></th>
        </tr>
        <tr>
            <td>Ghi chú:</td>
            <th><?php echo $stocker['ghiChu']; ?></th>
        </tr>
        <tr>
            <td>Email:</td>
            <th><?php echo $stocker['email']; ?></th>
        </tr>
        <tr>
            <td>Trạng thái tài khoản:</td>
            <th><?php echo $status; ?></th>
        </tr>
    </table>
    <div class="action">
        <a href="<?php echo baseUrl('stocker/edit/') . $stocker['idNhanVien']; ?>" class="btn btn-success">
            Chỉnh sửa
        </a>
    </div>
</div>
<?php
if (isset($_SESSION['successUpdateNVInfo'])) {
    unset($_SESSION['successUpdateNVInfo']);
}
if (isset($_SESSION['failUpdateNVInfo'])) {
    unset($_SESSION['failUpdateNVInfo']);
}
?>
