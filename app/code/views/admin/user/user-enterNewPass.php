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
    <div class="fa-new-pass">
        <div class="logo">
            <a href="<?php echo baseUrl('') ?>">
                <img class="logo-login"
                     src="<?php echo ADMIN_IMAGE_PATH; ?>../logo/mobileshop.png"/>
            </a>
        </div>
        <div class="wrap">
            <div class="title">
                Hãy nhập vào mật khẩu mới của bạn:
            </div>
            <div class="content">
                <form id="fa-changeNewPass" method="post" action="<?php echo baseUrl('user/saveNewPass'); ?>">
                    <table class="table">
                        <tr>
                            <th>Mật khẩu mới:</th>
                            <td>
                                <input id="fa-newpass" name="fa-newpass"
                                       type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Xác nhận mật khẩu mới:</th>
                            <td>
                                <input id="fa-confirmpass" name="fa-confimpass"
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
                                    <?php echo isset($_SESSION['forgetChangepassSuccess']) ? $_SESSION['forgetChangepassSuccess'] : ''; ?>
                                </div>
                                <div class="change-fail">
                                    <?php echo isset($_SESSION['forgetChangepassFail']) ? $_SESSION['forgetChangepassFail'] : ''; ?>
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
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH . $js_file; ?>"></script>
    </body>
    </html>
<?php
if (isset($_SESSION['forgetChangepassSuccess'])) {
    unset($_SESSION['forgetChangepassSuccess']);
}
if (isset($_SESSION['forgetChangepassFail'])) {
    unset($_SESSION['forgetChangepassFail']);
}
?>