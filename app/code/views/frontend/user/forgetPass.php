<div class="forgetPass">
    <div class="wrap">
        <div class="title">
            Vui lòng điền vào email của bạn để chúng tôi gửi link đổi mật khẩu:
        </div>
        <hr>
        <div>
            <form method="post" action="<?php echo baseUrl('user/executeForgetPass'); ?>">
                <input type="email" name="email-forget" required/>
                <button type="submit" class="btn btn-success">
                    Gửi email
                </button>
            </form>
        </div>
        <div class="success-email">
            <?php echo isset($_SESSION['mail-changePass-success']) ? $_SESSION['mail-changePass-success'] : ''; ?>
        </div>
        <div class="fail-email">
            <?php echo isset($_SESSION['mail-changePass-fail']) ? $_SESSION['mail-changePass-fail'] : ''; ?>
        </div>
        <div class="notexist-email">
            <?php echo isset($_SESSION['mail-changePass-notexist']) ? $_SESSION['mail-changePass-notexist'] : ''; ?>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['mail-changePass-success'])) {
    unset($_SESSION['mail-changePass-success']);
}
if (isset($_SESSION['mail-changePass-fail'])) {
    unset($_SESSION['mail-changePass-fail']);
}
if (isset($_SESSION['mail-changePass-notexist'])) {
    unset($_SESSION['mail-changePass-notexist']);
}
?>