<?php
echo "<script type='text/javascript'>
        var numberBasePrice = '" . sizeof($listBasePrice) . "';
      </script>";
//   pretty($listBasePrice);
?>
<div id="manage-baseprice">
    <h4>
        QUẢN LÝ SẢN PHẨM GIÁ SỐC
    </h4>
    <div class="success-update">
        <?php echo (isset($_SESSION['updateVisibleBasePriceSuccess']) ? $_SESSION['updateVisibleBasePriceSuccess'] : ''); ?>
    </div>
    <div class="content">
        <form id="formUpdageBasePrice" method="post" action="<?php echo baseUrl('product/updateVisibleBasePrice'); ?>">
            <table class="table">
                <tr>
                    <th class="c1">STT</th>
                    <th class="c2">Tên điện thoại</th>
                    <th class="c3">Hình ảnh</th>
                    <th class="c4">Bộ nhớ</th>
                    <th class="c4">Giảm giá</th>
                    <th class="c5">Giá bán</th>
                    <th class="c6">Hiển thị</th>
                </tr>
                <?php for ($i = 0; $i < sizeof($listBasePrice); $i++) :
                    if ($listBasePrice[$i]['visibleOnHome'] == "1") {
                        echo "<script type='text/javascript'>
                                var visibleOnHome" . $i . " = 1;
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                                var visibleOnHome" . $i . " = 0;
                            </script>";
                    }
                ?>
                    <tr>
                        <td class="c1"><?php echo $i + 1; ?></td>
                        <td class="c2"><a href="<?php echo baseUrl('product/index/' . $listBasePrice[$i]['idMobile']); ?>"><?php echo $listBasePrice[$i]['tenDienThoai']; ?></a></td>
                        <td class="c3"><img src="<?php echo BASE_URL . $listBasePrice[$i][0]; ?>" alt=""></td>
                        <td class="c4"><?php echo $listBasePrice[$i]['boNhoTrong']; ?>Gb</td>
                        <td class="c4"><?php echo formatPrice($listBasePrice[$i]['giamGia']); ?></td>
                        <td class="c5"><?php echo formatPrice($listBasePrice[$i]['giaBan']); ?></td>
                        <td class="c6"><input class="cb-<?php echo $i; ?>" type="checkbox" name="visibleOnHomeBase<?php echo $listBasePrice[$i]['idMobile']; ?>"></td>

                    </tr>
                <?php endfor; ?>
            </table>
            <button type="submit" class="btn btn-info">
                Cập nhật
            </button>
        </form>
    </div>
</div>
<?php
if (isset($_SESSION['updateVisibleBasePriceSuccess'])) {
    unset($_SESSION['updateVisibleBasePriceSuccess']);
}
?>