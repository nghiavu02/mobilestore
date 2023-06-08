<?php
define('ADMIN_CSS_PATH', BASE_URL . 'static/css/admin/');
define('ADMIN_JS_PATH', BASE_URL . 'static/js/admin/');
define('ADMIN_IMAGE_PATH', BASE_URL . 'static/image/admin/');
$css_file = getModule() . '-' . getAction() . '.css';
$js_file = getModule() . '-' . getAction() . '.js';
echo "<script type='text/javascript'>
        var baseurlAdmin = '" . ADMIN_BASE_URL . "';
    </script>";
?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>FORGET PASSWORD ADMIN AREA</title>
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH; ?>../bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH . $css_file; ?>"/>
        <link rel="icon" type="image/png" href="<?php echo ADMIN_IMAGE_PATH; ?>../logo/mobileshop.png">
    </head>
    <body>
    <div id="admin-forgetPass">
        <div class="logo">
            <a href="<?php echo baseUrl('') ?>">
                <img class="logo-login"
                     src="<?php echo ADMIN_IMAGE_PATH; ?>../logo/mobileshop.png"/>
            </a>
        </div>
        <div class="wrap">
            <div class="title">
                Vui lòng điền vào email của bạn để chúng tôi gửi link đổi mật khẩu:
            </div>
            <hr>
            <div>
                <form method="post" action="<?php echo baseUrl('user/executeForgetPass'); ?>">
                    <input type="email" name="a-email-forget" required/>
                    <button type="submit" class="btn btn-success">
                        Gửi email
                    </button>
                </form>
            </div>
            <div class="success-email">
                <?php echo isset($_SESSION['mailChangePass-success']) ? $_SESSION['mailChangePass-success'] : ''; ?>
            </div>
            <div class="fail-email">
                <?php echo isset($_SESSION['mailChangePass-fail']) ? $_SESSION['mailChangePass-fail'] : ''; ?>
            </div>
            <div class="notexist-email">
                <?php echo isset($_SESSION['mailChangePass-notexist']) ? $_SESSION['mailChangePass-notexist'] : ''; ?>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php
if (isset($_SESSION['mailChangePass-success'])) {
    unset($_SESSION['mailChangePass-success']);
}
if (isset($_SESSION['mailChangePass-fail'])) {
    unset($_SESSION['mailChangePass-fail']);
}
if (isset($_SESSION['mailChangePass-notexist'])) {
    unset($_SESSION['mailChangePass-notexist']);
}
?>