<?php
$numberOrders = sizeof($listOrders);
echo "<script type='text/javascript'>
        var numberOrders = $numberOrders;
      </script>";
?>
<div id="listNotShipped">
    <h4>DANH SÁCH ĐƠN HÀNG ĐÃ GIAO</h4>
    <div class="content">
        <table class="table">
            <tr>
                <th>ID đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Điện thoại</th>
                <th>Ngày tạo</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
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
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>