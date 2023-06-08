<?php
echo "<script>
    var baseurl = '" . BASE_URL . "';
    </script>"
?>
    <div class="login-page">
        <a href="#" name="top-form-login"></a>
        <div class="loginform">
            <form method="POST" class="register-form" id="register-form"
                  action="<?php echo baseUrl('user/register'); ?>">
                <input type="text" class="reg-name" name="reg-name" placeholder="Tên của bạn" autocomplete="off"
                       required/>
                <input type="email" class="reg-email" name="reg-email" placeholder="Địa chỉ email" autocomplete="off"
                       required/>
                <input type="password" class="reg-password" name="reg-password" placeholder="Mật khẩu"
                       autocomplete="off"
                       required/>
                <input type="text" class="reg-address" name="reg-address" placeholder="Địa chỉ" autocomplete="off"
                       required/>
                <input type="number" class="reg-phone" name="reg-phone" placeholder="Số điện thoại" autocomplete="off"
                       required/>
                <input type="hidden" name="rp-valid" id="rp-valid" value="false">
                <button type="submit" name="createAccount">Tạo mới</button>
                <p class="message">Sẵn sàng? <a href="#">Đăng nhập</a></p>
            </form>
            <form method="POST" class="login-form" id="login-form" action="<?php echo baseUrl('user/checkLogin'); ?>">
                <input type="email" class="login-email" name="login-email" placeholder="Địa chỉ email"
                       autocomplete="off"
                       required/>
                <input type="password" class="login-password" name="login-password" placeholder="Mật khẩu"
                       autocomplete="off" required/>
                <input type="hidden" name="lp-valid" id="lp-valid" value="false">
                <button type="submit" name="login">Đăng nhập</button>
                <p class="message">Chưa có tài khoản? <a href="#">Tạo tài khoản</a></p>
            </form>
            <div id="status-login">
                <?php echo(isset($_SESSION['wrong-password']) ? $_SESSION['wrong-password'] : ''); ?>
            </div>
            <div class="login-error">
            </div>
            <div id="search-email">
            </div>
            <div id="notice">
                <h3>Mật khẩu phải chứa:</h3>
                <p id="letter" class="invalid">Một chữ cái <b>viết thường</b></p>
                <p id="capital" class="invalid">Một chữ cái <b>viết hoa</b></p>
                <p id="number" class="invalid">Một <b>chữ số</b></p>
                <p id="length" class="invalid">Ít nhất <b>8 ký tự</b></p>
            </div>
            <div class="user-forgetPass">
                <a href="<?php echo baseUrl('user/forgetPass'); ?>">Quên mật khẩu ?</a>
            </div>
        </div>
    </div>

<?php
if (isset($_SESSION['wrong-password'])) {
    unset($_SESSION['wrong-password']);
}
?>