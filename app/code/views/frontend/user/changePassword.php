<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
if (!$isSignedIn){
    redirect('user/login');
}
?>
<div class="change-password-customer">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="top-title">
                    <h3>THAY ĐỔI MẬT KHẨU</h3>
                </div>
                <div class="wrap">
                    <div class="error-changePass"
                         style="display:<?php echo isset($_SESSION['error-changePassCustomer']) ? 'block' : 'none'; ?>">
                        <?php echo isset($_SESSION['error-changePassCustomer']) ? $_SESSION['error-changePassCustomer'] : ''; ?>
                    </div>
                    <div class="success"></div>
                    <div class="error"></div>
                    <form action="<?php echo baseUrl('user/savePassword'); ?>" method="POST"
                          id="customer-change-password">
                        <table class="table">
                            <tr>
                                <td><label for="password_current">Mật khẩu hiện tại:</label></td>
                                <td><input type="password" name="customer_password_current" id="password_current"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/></td>
                            </tr>
                            <tr>
                                <td><label for="password_new">Mật khẩu mới:</label></td>
                                <td><input type="password" name="customer_password_new" id="password_new"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/></td>
                            </tr>
                            <tr>
                                <td><label for="password_confirm">Xác nhận mật khẩu:</label></td>
                                <td><input type="password" name="customer_password_confirm" id="password_confirm"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/></td>
                            </tr>
                        </table>
                        <div class="controls">
                            <button class="btn btn-success" name="submit" type="submit">
                                Lưu thay đổi
                            </button>
                            <a href="<?php echo baseUrl('user/index'); ?>">
                                <div class="btn btn-danger btn2">Huỷ bỏ</div>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="note">
                    Chú ý: Mật khẩu phải từ 8 ký tự trở lên, chứa chữ cái viết hoa, viết thường và chữ số.
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['error-changePassCustomer'])) {
    unset($_SESSION['error-changePassCustomer']);
}
?>