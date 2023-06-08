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
                    <h3>CHỈNH SỬA THÔNG TIN CÁ NHÂN</h3>
                </div>
                <div class="error">
                    Khong duoc rong !
                </div>
                <form id="change-customer-info" method="POST" action="<?php echo baseUrl('user/saveInfo'); ?>">
                    <div class="user-info">
                        <table>
                            <tr>
                                <td class="title">Họ và tên:</td>
                                <td class="content"><input type="text" value="" class="user-edit-name"
                                                           name="user-edit-name"></td>
                            </tr>
                            <tr>
                                <td class="title">Địa chỉ email:</td>
                                <td class="content"><?php echo $_SESSION['email']; ?></td>
                            </tr>
                            <tr>
                                <td class="title">Số điện thoại:</td>
                                <td class="content"><input type="text" value="" class="user-edit-phone"
                                                           name="user-edit-phone"></td>
                            </tr>
                            <tr>
                                <td class="title">Địa chỉ:</td>
                                <td class="content"><input type="text" value="" class="user-edit-address"
                                                           name="user-edit-address"></td>
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
                            <button class="btn btn-success btn1" type="submit">Lưu
                            </button>
                            <a href="<?php echo baseUrl('user/index'); ?>">
                                <div class="btn btn-danger btn2">Hủy bỏ</div>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
