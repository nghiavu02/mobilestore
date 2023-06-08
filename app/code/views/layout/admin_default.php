<?php
// define()
define('ADMIN_CSS_PATH', BASE_URL . 'static/css/admin/');
define('ADMIN_JS_PATH', BASE_URL . 'static/js/admin/');
define('ADMIN_FONT_PATH', BASE_URL . 'static/font/');
define('ADMIN_IMAGE_PATH', BASE_URL . 'static/image/admin/');
$css_file = getModule() . '-' . getAction() . '.css';
$js_file = getModule() . '-' . getAction() . '.js';
$isSignedIn = isset($_SESSION['isSignedIn']) ? true : false;
$chucVu = $_SESSION['chucvuNV'] ?? null;
$textChucVu = null;
switch ($chucVu) {
    case 'Quản trị viên':
        $textChucVu = "Quản trị viên";
        break;
    case 'Nhân viên bán hàng':
        $textChucVu = "Nhân viên bán hàng";
        break;
    case 'Nhân viên thủ kho':
        $textChucVu = "Nhân viên thủ kho";
        break;
    case 'Nhân viên giao hàng':
        $textChucVu = "Nhân viên giao hàng";
        break;
}

echo "<script type='text/javascript'>
        var baseurlAdmin = '" . ADMIN_BASE_URL . "';
    </script>";

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MOBILE SHOP ADMIN PAGE</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH; ?>../../font/simple-line-icon/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_FONT_PATH; ?>nunito/nunito.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_FONT_PATH; ?>awesome/awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_FONT_PATH; ?>awesome/awesome-free.css" />
    <link rel="icon" type="image/png" href="<?php echo ADMIN_IMAGE_PATH; ?>../logo/mobileshop.png">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH; ?>default-layout.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH; ?>user-edit.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH . $css_file; ?>" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo baseUrl(''); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo ($textChucVu); ?></div>
            </a>

            <?php if ($chucVu === 'Quản trị viên' || $chucVu === "Nhân viên bán hàng") : ?>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo baseUrl(''); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Bảng điều khiển</span></a>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === 'Quản trị viên' || $chucVu === "Nhân viên bán hàng") : ?>
                <!-- Submenu 1 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Trang home</span>
                    </a>
                    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo baseUrl('banner/list'); ?>">Banner</a>
                            <a class="collapse-item" href="<?php echo baseUrl('product/listBasePrice'); ?>">Sản phẩm giá
                                sốc</a>
                            <a class="collapse-item" href="<?php echo baseUrl('product/listNew'); ?>">Sản phẩm mới</a>
                            <a class="collapse-item" href="<?php echo baseUrl('product/listExpress'); ?>">Sản phẩm nổi
                                bật</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === 'Quản trị viên' || $chucVu === "Nhân viên bán hàng") : ?>
                <!-- Submenu 2 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo baseUrl('order/listNotApprove'); ?>">Chưa phê duyệt</a>
                            <a class="collapse-item" href="<?php echo baseUrl('order/listApproved'); ?>">Đã phê duyệt</a>
                            <?php if ($chucVu === "Quản trị viên") : ?>
                                <a class="collapse-item" href="<?php echo baseUrl('order/listShipping'); ?>">Đang giao hàng</a>
                            <?php endif; ?>
                            <a class="collapse-item" href="<?php echo baseUrl('order/checkout'); ?>">Thanh toán đơn hàng</a>
                            <a class="collapse-item" href="<?php echo baseUrl('order/listAlreadyCheckout'); ?>">Đã thanh toán</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === 'Quản trị viên' || $chucVu === "Nhân viên bán hàng") : ?>
                <!-- Submenu 3 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo baseUrl('category/list'); ?>">Thể loại</a>
                            <a class="collapse-item" href="<?php echo baseUrl('manufacturer/list'); ?>">Nhà sản xuất</a>
                            <a class="collapse-item" href="<?php echo baseUrl('supplier/list'); ?>">Nhà cung cấp</a>
                            <a class="collapse-item" href="<?php echo baseUrl('product/list'); ?>">Sản phẩm</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === 'Quản trị viên' || $chucVu === "Nhân viên bán hàng" || $chucVu === "Nhân viên thủ kho") : ?>
                <!-- Submenu 4 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Nhập hàng</span>
                    </a>
                    <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Nhập lô hàng</h6>
                            <a class="collapse-item" href="login.html">Đơn chưa nhập</a>
                            <a class="collapse-item" href="register.html">Đơn đã nhập</a>
                            <h6 class="collapse-header">Hàng trả lại</h6>
                            <a class="collapse-item" href="register.html">Nhập hàng khách trả</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === 'Quản trị viên') : ?>
                <!-- Submenu 5 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Nhân sự</span>
                    </a>
                    <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo baseUrl('user/register'); ?>">Tạo tài khoản mới</a>
                            <a class="collapse-item" href="<?php echo baseUrl('admin/list'); ?>">Quản trị viên</a>
                            <a class="collapse-item" href="<?php echo baseUrl('seller/list'); ?>">Nhân viên bán hàng</a>
                            <a class="collapse-item" href="<?php echo baseUrl('stocker/list'); ?>">Nhân viên thủ kho</a>
                            <a class="collapse-item" href="<?php echo baseUrl('shipper/list'); ?>">Nhân viên giao hàng</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === "Nhân viên thủ kho") : ?>
                <!-- Submenu 6 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages6" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Phân công giao hàng</span>
                    </a>
                    <div id="collapsePages6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo baseUrl('order/listApproved'); ?>">Đơn hàng chưa giao</a>
                            <a class="collapse-item" href="<?php echo baseUrl('order/listShipping'); ?>">Đơn hàng đang giao</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === "Nhân viên giao hàng") : ?>
                <!-- Submenu 7 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages7" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Giao hàng</span>
                    </a>
                    <div id="collapsePages7" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo baseUrl('order/listNotShipped'); ?>">Đơn hàng chưa giao</a>
                            <a class="collapse-item" href="<?php echo baseUrl('order/listAlreadyShipped'); ?>">Đơn hàng đã giao</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if ($chucVu === 'Quản trị viên' || $chucVu === "Nhân viên bán hàng") : ?>
                <!-- Submenu 8 -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages8" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-mobile-alt"></i>
                        <span>Thống kê</span>
                    </a>
                    <div id="collapsePages8" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="login.html">Doanh thu</a>
                            <a class="collapse-item" href="register.html">Đơn hàng</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <!-- <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small username">
                                    <?php echo $_SESSION['nameNV']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?php echo ADMIN_IMAGE_PATH; ?>user-icon.png" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a target="_blank" class="dropdown-item" href="<?php echo BASE_URL; ?>">
                                    <i class="fas fa-sitemap fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Website
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo baseUrl('user/index'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông tin cá nhân
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo baseUrl('user/changePassword'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đổi mật khẩu
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div>
                        <?php echo $content; ?>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Bản quyền thuộc về &copy; Nhóm 10</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng xuất tài khoản?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Nhấn nút "Đăng xuất" để kết thúc phiên làm việc của bạn !</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-primary" href="<?php echo baseUrl('user/logout'); ?>">Đăng xuất</a>
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
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>user-edit.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>../html2pdf.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH . $js_file; ?>"></script>

</body>

</html>