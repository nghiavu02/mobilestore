<div id="admin-change-pass">
    <h4>
        Trang đổi mật khẩu
    </h4>
    <div class="change-pass-info">
        <form action="<?php echo baseUrl('user/savePassword'); ?>" method="POST"
              id="nv-change-password">
            <table class="table">
                <tr>
                    <td class="left-col"><label for="password_current">Mật khẩu hiện tại:</label></td>
                    <td class="right-col"><input type="password" name="_password_current" id="_password_current"
                                                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/></td>
                </tr>
                <tr>
                    <td class="left-col"><label for="password_new">Mật khẩu mới:</label></td>
                    <td class="right-col"><input type="password" name="_password_new" id="_password_new"
                                                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/></td>
                </tr>
                <tr>
                    <td class="left-col"><label for="password_confirm">Xác nhận mật khẩu:</label></td>
                    <td class="right-col"><input type="password" name="_password_confirm" id="_password_confirm"
                                                 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
                    </td>

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
        <div class="note">
            Chú ý: Mật khẩu phải từ 8 ký tự trở lên, chứa chữ cái viết hoa, viết thường và chữ số.
        </div>
        <div class="error-changePassNV"
             style="display:<?php echo isset($_SESSION['error-changePassNV']) ? 'block' : 'none'; ?>">
            <?php echo isset($_SESSION['error-changePassNV']) ? $_SESSION['error-changePassNV'] : ''; ?>
        </div>
        <div class="success-changePassNV"
             style="display:<?php echo isset($_SESSION['success-changePassNV']) ? 'block' : 'none'; ?>">
            <?php echo isset($_SESSION['success-changePassNV']) ? $_SESSION['success-changePassNV'] : ''; ?>
        </div>
        <div class="_error"></div>
    </div>
</div>
<?php
if (isset($_SESSION['error-changePassNV'])) {
    unset($_SESSION['error-changePassNV']);
}
if (isset($_SESSION['success-changePassNV'])) {
    unset($_SESSION['success-changePassNV']);
}
?>