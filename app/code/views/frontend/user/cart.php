<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
if (!$isSignedIn) {
    redirect('user/login');
}
?>
<?php
//pretty($arrayItemsCart);
$totalPrice = 0;
?>
<div class="cart-page">
    <div class="cart-title">
        <h3>GIỎ HÀNG CỦA BẠN</h3>
    </div>
    <div class="cart-content container">
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên điện thoại</th>
                        <th>Màu sắc</th>
                        <th class="soLuong">Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                    <?php for ($i = 0; $i < sizeof($arrayMobiles); $i++) : ?>
                        <?php $soLuong = $arrayItemsCart[$i]['soLuong']; ?>
                        <tr class="item-wc-<?php echo $arrayItemsCart[$i]['id']; ?>">
                            <td>
                                <img class="image" src="<?php echo BASE_URL . $arrayMobiles[$i][0]; ?>"
                                     alt="image-mobile">
                            </td>
                            <td style="font-weight: bold;">
                                <a href="<?php echo baseUrl('product/index/') . $arrayMobiles[$i]['idMobile']; ?>">
                                    <?php echo $arrayMobiles[$i]['tenDienThoai']; ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $arrayMobiles[$i]['mauSac']; ?>
                            </td>
                            <td class="soLuong">
                                <span class="idItemCart"
                                      style="display: none"><?php echo $arrayItemsCart[$i]['id']; ?></span>
                                <button onclick="<?php echo 'reduceCount(' . $arrayItemsCart[$i]['id'] . ')'; ?>">-
                                </button>
                                <span class="item item-<?php echo $arrayItemsCart[$i]['id']; ?>"><?php echo $soLuong; ?></span>
                                <button onclick="<?php echo 'increaseCount(' . $arrayItemsCart[$i]['id'] . ')'; ?>">+
                                </button>
                            </td>
                            <td>
                                <?php echo formatPrice($soLuong * ($arrayMobiles[$i]['giaBan'] - $arrayMobiles[$i]['giamGia'])); ?>
                                <?php $totalPrice += $soLuong * ($arrayMobiles[$i]['giaBan'] - $arrayMobiles[$i]['giamGia']); ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-add-wishlist"
                                        onclick="<?php echo $isSignedIn ? "deleteItemCart({$arrayItemsCart[$i]['id']})" : "location.href='" . baseUrl('user/login') . "'" ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <button class="btn btn-info updateGioHang"
                        style="display: <?php echo ($totalPrice > 0) ? 'block' : 'none'; ?>"
                        onclick="updateGlobalCart()"
                >
                    Cập nhật giỏ hàng
                </button>
            </div>
            <div class="col-md-3">
                <table class="second-table table">
                    <tr>
                        <th>Miễn phí giao hàng</th>
                    </tr>
                    <tr>
                        <th>Tổng tiền: <span class="total-price"><?php echo formatPrice($totalPrice); ?></span></th>
                    </tr>
                    <tr>
                        <th>
                            <button class="btn btn-success datHang"
                                    style="display: <?php echo ($totalPrice > 0) ? 'block' : 'none'; ?>"
                                    onclick="<?php echo "location.href='" . baseUrl('user/order') . "'"; ?>"
                            >Đặt hàng
                            </button>
                            <br/>
                            <button class="btn btn-primary tiepTuc"
                                    onclick="<?php echo "location.href='" . baseUrl('') . "'" ?>"
                            >Tiếp tục mua sắm
                            </button>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>