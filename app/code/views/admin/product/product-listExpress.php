<?php
echo "<script type='text/javascript'>
        var numberExpress = '" . sizeof($listExpress) . "';
      </script>";
?>
<div id="manage-express">
    <h4>
        QUẢN LÝ SẢN PHẨM NỔI BẬT
    </h4>
    <div class="success-update">
        <?php echo (isset($_SESSION['updateVisibleExpressSuccess']) ? $_SESSION['updateVisibleExpressSuccess'] : ''); ?>
    </div>
    <div class="content">
        <form id="formUpdageExpress" method="post" action="<?php echo baseUrl('product/updateVisibleExpress'); ?>">
            <table class="table">
                <tr>
                    <th class="c1">STT</th>
                    <th class="c2">Tên điện thoại</th>
                    <th class="c3">Hình ảnh</th>
                    <th class="c3">Màu sắc</th>
                    <th class="c4">Bộ nhớ</th>
                    <th class="c4">Giảm nhập</th>
                    <th class="c5">Giá bán</th>
                    <th class="c6">Hiển thị</th>
                </tr>
                <?php for ($i = 0; $i < sizeof($listExpress); $i++) :
                    if ($listExpress[$i]['visibleOnHome'] == "1") {
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
                        <td class="c2"><a href="<?php echo baseUrl('product/index/' . $listExpress[$i]['idMobile']); ?>"><?php echo $listExpress[$i]['tenDienThoai']; ?></a></td>
                        <td class="c3"><img src="<?php echo BASE_URL . $listExpress[$i][0]; ?>" alt=""></td>
                        <td class="c4"><?php echo $listExpress[$i]['boNhoTrong']; ?>Gb</td>
                        <td class="c4"><?php echo $listExpress[$i]['mauSac']; ?>Gb</td>
                        <td class="c4"><?php echo formatPrice($listExpress[$i]['giaNhap']); ?></td>
                        <td class="c5"><?php echo formatPrice($listExpress[$i]['giaBan']); ?></td>
                        <td class="c6"><input class="cb-<?php echo $i; ?>" type="checkbox" name="visibleOnHomeBase<?php echo $listExpress[$i]['idMobile']; ?>"></td>

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
if (isset($_SESSION['updateVisibleExpressSuccess'])) {
    unset($_SESSION['updateVisibleExpressSuccess']);
}
?>