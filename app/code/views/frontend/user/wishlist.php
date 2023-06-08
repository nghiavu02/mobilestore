<?php
$isSignedIn = isset($_SESSION['username']) ? true : false;
if (!$isSignedIn) {
    redirect('user/login');
}
echo "<script type='text/javascript'>

</script>";
?>
<div class="wishlist-page">
    <div class="wishlist-title">
        <h3>DANH MỤC SẢN PHẨM YÊU THÍCH CỦA BẠN</h3>
    </div>
    <div class="wishlist-content">
        <table class="table">
            <?php for ($i = 0; $i < sizeof($arrayMobiles); $i++) : ?>
                <tr class="item-wl-<?php echo $arrayMobiles[$i]['idMobile']; ?>">
                    <td style="font-weight: bold;">
                        <a href="<?php echo baseUrl('product/index/') . $arrayMobiles[$i]['idMobile']; ?>">
                            <?php echo $arrayMobiles[$i]['tenDienThoai']; ?>
                        </a>
                    </td>
                    <td>
                        <img class="image" src="<?php echo BASE_URL . $arrayMobiles[$i][0]; ?>" alt="image-mobile">
                    </td>
                    <td>
                        <?php echo $arrayMobiles[$i]['mauSac']; ?>
                    </td>
                    <td>
                        <?php echo formatPrice($arrayMobiles[$i]['giaBan'] - $arrayMobiles[$i]['giamGia']); ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success btn-add-cart"
                                onclick="<?php echo $isSignedIn ? "addToCart({$arrayMobiles[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>"
                                style="display: <?php echo ($arrayMobiles[$i]['soLuongTrongKho'] > 0) ? 'inline-block' : 'none'; ?>"
                        >
                            Add to cart
                        </button>
                        <button type="button" class="btn btn-danger btn-add-wishlist"
                                onclick="<?php echo $isSignedIn ? "deleteItemWishlist({$arrayMobiles[$i]['idMobile']})" : "location.href='" . baseUrl('user/login') . "'" ?>">
                            Delete from wishlist
                        </button>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>