<div class="new-pass">
    <div class="wrap">
        <div class="title">
            Hãy nhập vào mật khẩu mới của bạn:
        </div>
        <div class="content">
            <form id="changeNewPass" method="post" action="<?php echo baseUrl('user/saveNewPass'); ?>">
                <table class="table">
                    <tr>
                        <th>Mật khẩu mới:</th>
                        <td>
                            <input id="f-newpass" name="f-newpass"
                                   type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Xác nhận mật khẩu mới:</th>
                        <td>
                            <input id="f-confirmpass" name="f-confimpass"
                                   type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <button type="submit" class="btn btn-success">
                                Đổi mật khẩu
                            </button>
                        </th>
                        <td>
                            <div class="change-success">
                                <?php echo isset($_SESSION['forget-changepass-success']) ? $_SESSION['forget-changepass-success'] : ''; ?>
                            </div>
                            <div class="change-fail">
                                <?php echo isset($_SESSION['forget-changepass-fail']) ? $_SESSION['forget-changepass-fail'] : ''; ?>
                            </div>
                            <div class="note-password">

                            </div>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <div class="note">
            Mật khẩu mới phải chứa ít nhất 8 ký tự, có chữ in hoa, in thường và chữ số.
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['forget-changepass-success'])) {
    unset($_SESSION['forget-changepass-success']);
}
if (isset($_SESSION['forget-changepass-fail'])) {
    unset($_SESSION['forget-changepass-fail']);
}
?>