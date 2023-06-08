<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
if (!$isSignedIn) {
    redirect('user/login');
}
$totalPrice = 0;
?>

<div class="order-page">
    <div class="order-title">
        <h3>TRANG ĐẶT HÀNG</h3>
    </div>
    <form method="POST" action="<?php echo baseUrl('order/checkout'); ?>">
        <div class="order-content container">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-order">
                        <table class="table">
                            <tr>
                                <td class="td1">Tên khách hàng</td>
                                <td><?php echo $user['tenKhachHang']; ?></td>
                            </tr>
                            <tr>
                                <td class="td1">Email</td>
                                <td><?php echo $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td class="td1">Số điện thoại</td>
                                <td><?php echo $user['soDienThoai']; ?></td>
                            </tr>
                            <tr>
                                <td class="td1">Địa chỉ</td>
                                <td><?php echo $user['diaChi']; ?></td>
                            </tr>
                            <tr>
                                <td class="td1">Địa chỉ giao hàng</td>
                                <td><input type="text" name="dcGiaoHang" required></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-5">
                    <table class="second-table table">
                        <tr>
                            <th>Miễn phí giao hàng</th>
                            <th></th>
                        </tr>
                        <?php for ($i = 0; $i < sizeof($arrayMobiles); $i++):
                            $totalPrice += ($arrayMobiles[$i]['number-on-cart']) * ($arrayMobiles[$i]['giaBan'] - $arrayMobiles[$i]['giamGia']);
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo BASE_URL . $arrayMobiles[$i][0] ?>" alt="logo-mobile">
                                    <span class="mobile-name">
                                        <?php echo $arrayMobiles[$i]['tenDienThoai']; ?>
                                    </span>
                                    <span class="count">
                                        x<?php echo $arrayMobiles[$i]['number-on-cart']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="price">
                                        <?php echo formatPrice(($arrayMobiles[$i]['number-on-cart']) * ($arrayMobiles[$i]['giaBan'] - $arrayMobiles[$i]['giamGia'])); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endfor; ?>
                        <tr>
                            <th>Tổng tiền:</span></th>
                            <input name="totalPrice" type="hidden" value="<?php echo $totalPrice; ?>">
                            <th><span class="total-price"><?php echo formatPrice($totalPrice); ?></th>
                        </tr>
                        <tr>
                            <th>
                                <button style="display: <?php echo ($totalPrice > 0) ? 'block' : 'none'; ?>" type="submit" class="btn btn-success datHang">Xác nhận đặt hàng</button>
                            </th>
                            <th></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
