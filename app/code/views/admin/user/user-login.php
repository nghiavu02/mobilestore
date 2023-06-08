<?php
// define()
define('ADMIN_CSS_PATH', BASE_URL . 'static/css/admin/');
define('ADMIN_JS_PATH', BASE_URL . 'static/js/admin/');
define('ADMIN_FONT_PATH', BASE_URL . 'static/font/');
define('ADMIN_IMAGE_PATH', BASE_URL . 'static/image/admin/');
$css_file = getModule() . '-' . getAction() . '.css';
$isSignedIn = isset($_SESSION['isSignedIn']) ? true : false;
echo "<script>
    var baseurlAdmin = '" . ADMIN_BASE_URL . "';
    </script>"
?>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Mobile Shop - Admin Login</title>

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" type="text/css"
              href="<?php echo ADMIN_CSS_PATH; ?>../../font/simple-line-icon/simple-line-icons.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_FONT_PATH; ?>nunito/nunito.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_FONT_PATH; ?>awesome/awesome.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_FONT_PATH; ?>awesome/awesome-free.css"/>
        <link rel="icon" type="image/png" href="<?php echo ADMIN_IMAGE_PATH; ?>../logo/mobileshop.png">
        <!-- Custom styles for this template-->
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH; ?>default-layout.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH . $css_file; ?>"/>

    </head>

    <body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="<?php echo ADMIN_IMAGE_PATH; ?>iphone11.png"/>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        
                                    </div>
                                    <form id="admin-login" method="post"
                                          action="<?php echo baseUrl('user/checkLogin'); ?>"
                                          class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                   id="login-email" aria-describedby="emailHelp"
                                                   placeholder="Địa chỉ email" required
                                                   name="a-login-email"
                                            >
                                            <div id="status-email"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   id="login-password" placeholder="Mật khẩu" required
                                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                   name="a-login-password"
                                            >
                                            <div id="status-password">
                                                <?php echo(isset($_SESSION['wrong-password-admin']) ? $_SESSION['wrong-password-admin'] : ''); ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo baseUrl('user/forgetPass')?>">Quên mật khẩu ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>bootstrap/jquery.easing.min.js"></script>
    <!-- Custom page JavaScript-->
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>sb-admin-2.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>user-login.js"></script>

    </body>

    </html>
<?php
if (isset($_SESSION['wrong-password-admin'])) {
    unset($_SESSION['wrong-password-admin']);
}
?>