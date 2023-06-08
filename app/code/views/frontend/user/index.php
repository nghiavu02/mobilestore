<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
if (!$isSignedIn){
    redirect('user/login');
}
?>
<div class="user-information">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="top-title">
                    <h3>THÔNG TIN CÁ NHÂN</h3>
                </div>
                <div class="user-info">
                    <div class="success-update-password"
                         style="display: <?php echo isset($_SESSION['success-changePassCustomer']) ? 'block' : 'none'; ?>">
                        <?php echo isset($_SESSION['success-changePassCustomer']) ? $_SESSION['success-changePassCustomer'] : ''; ?>
                    </div>
                    <div class="success-update-customer-info"
                         style="display: <?php echo(isset($_SESSION['success-update-customer-info']) ? 'block' : 'none'); ?>">
                        <?php echo(isset($_SESSION['success-update-customer-info']) ? $_SESSION['success-update-customer-info'] : ''); ?>
                    </div>
                    <div class="fail-update-customer-info"
                         style="display: <?php echo(isset($_SESSION['fail-update-customer-info']) ? 'block' : 'none'); ?>">
                        <?php echo(isset($_SESSION['fail-update-customer-info']) ? $_SESSION['fail-update-customer-info'] : ''); ?>
                    </div>
                    <table>
                        <tr>
                            <td class="title">Họ và tên:</td>
                            <td class="content"><?php echo $_SESSION['username']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Địa chỉ email:</td>
                            <td class="content"><?php echo $_SESSION['email']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Số điện thoại:</td>
                            <td class="content"><?php echo $_SESSION['phone']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Địa chỉ:</td>
                            <td class="content"><?php echo $_SESSION['address']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Ngày tạo tài khoản:</td>
                            <td class="content"><?php echo $_SESSION['date']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Trạng thái tài khoản:</td>
                            <td class="content"><?php echo ($_SESSION['status'] == 1) ? 'Đã được kích hoạt' : 'Đang bị khóa'; ?></td>
                        </tr>
                    </table>
                    <div class="action">
                        <a href="<?php echo baseUrl('user/editInfo'); ?>">
                            <div class="btn btn-danger btn1">Chỉnh sửa</div>
                        </a>
                        <a href="<?php echo baseUrl('user/changePassword'); ?>">
                            <div class="btn btn-primary btn2">Đổi mật khẩu</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['success-update-customer-info'])) {
    unset($_SESSION['success-update-customer-info']);
}
if (isset($_SESSION['fail-update-customer-info'])) {
    unset($_SESSION['fail-update-customer-info']);
}
if (isset($_SESSION['success-changePassCustomer'])) {
    unset($_SESSION['success-changePassCustomer']);
}
?>