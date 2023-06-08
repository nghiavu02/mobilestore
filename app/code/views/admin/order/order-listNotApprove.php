<?php
$numberOrders = sizeof($listOrders);
echo "<script type='text/javascript'>
        var numberOrders = $numberOrders;
      </script>";
?>
<div id="listNotApprove">
    <div class="title">
        <h4>DANH SÁCH ĐƠN HÀNG CHƯA PHÊ DUYỆT</h4>
        <a class="btn btn-success" href="<?php echo baseUrl('order/approveAll'); ?>">Phê duyệt tất cả</a>
    </div>
    <div class="successApprove">
        <?php echo isset($_SESSION['successApprove']) ? $_SESSION['successApprove'] : ''; ?>
    </div>
    <div class="successApproveAll">
        <?php echo isset($_SESSION['successApproveAll']) ? $_SESSION['successApproveAll'] : ''; ?>
    </div>
    <div class="failApprove">
        <?php echo isset($_SESSION['failApprove']) ? $_SESSION['failApprove'] : ''; ?>
    </div>
    <div class="failApproveAll">
        <?php echo isset($_SESSION['failApproveAll']) ? $_SESSION['failApproveAll'] : ''; ?>
    </div>
    <div class="content">
        <table class="table">
            <tr>
                <th>ID đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Điện thoại</th>
                <th>Ngày tạo</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            <?php for ($i = 0; $i < $numberOrders; $i++) :
                $khachHang = getKhachHang($listOrders[$i]['khachhang_idKhachHang']);
            ?>
                <tr class="tr" onclick="window.location.href = '<?php echo baseUrl('order/index/') . $listOrders[$i]['idDonHang']; ?>'">
                    <td class="<?php echo $i; ?>"><?php echo $listOrders[$i]['idDonHang']; ?></td>
                    <td><?php echo $khachHang[0]['tenKhachHang']; ?></td>
                    <td><?php echo $khachHang[0]['soDienThoai']; ?></td>
                    <td><?php echo $listOrders[$i]['ngayTao']; ?></td>
                    <td class="tien"><?php echo formatPrice($listOrders[$i]['tongTien']); ?></td>
                    <td class="trangthai"><?php echo $listOrders[$i]['trangThaiDonHang']; ?></td>
                    <td><a href="<?php echo baseUrl('order/approve/' . $listOrders[$i]['idDonHang']); ?>" class="btn btn-success">Phê duyệt</a></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>

<?php
if (isset($_SESSION['failApprove'])) {
    unset($_SESSION['failApprove']);
}
if (isset($_SESSION['failApproveAll'])) {
    unset($_SESSION['failApproveAll']);
}
if (isset($_SESSION['successApprove'])) {
    unset($_SESSION['successApprove']);
}
if (isset($_SESSION['successApproveAll'])) {
    unset($_SESSION['successApproveAll']);
}
?>