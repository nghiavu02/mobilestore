<?php
$isSignedIn = isset($_SESSION['isSignedIn']) ? true : false;
if (!$isSignedIn) {
    redirect('user/login');
}
$statusAccount = null;
switch ($_SESSION['statusNV']) {
    case 2 :
        $statusAccount = "Bị vô hiệu hóa";
        break;
    case 0 :
        $statusAccount = "Chưa được kích hoạt";
        break;
    case 1 :
        $statusAccount = "Đã kích hoạt";
        break;
}
?>
<div id="user-info">
    <h4>Trang thông tin cá nhân</h4>
    <div class="admin-user-info">
        <table class="table">
            <tr>
                <td class="title">Họ và tên:</td>
                <td class="content"><?php echo $_SESSION['nameNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Giới tính:</td>
                <td class="content"><?php echo $_SESSION['sexNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Ngày sinh:</td>
                <td class="content"><?php echo $_SESSION['birdNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Quê quán:</td>
                <td class="content"><?php echo $_SESSION['addressNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Chứng minh nhân dân:</td>
                <td class="content"><?php echo $_SESSION['cmndNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Số điện thoại:</td>
                <td class="content"><?php echo $_SESSION['phoneNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Chức vụ:</td>
                <td class="content"><?php echo $_SESSION['chucvuNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Ghi chú:</td>
                <td class="content"><?php echo $_SESSION['ghichuNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Địa chỉ email:</td>
                <td class="content"><?php echo $_SESSION['emailNV']; ?></td>
            </tr>
            <tr>
                <td class="title">Trạng thái tài khoản:</td>
                <td class="content"><?php echo $statusAccount; ?></td>
            </tr>
        </table>
    </div>
</div>
