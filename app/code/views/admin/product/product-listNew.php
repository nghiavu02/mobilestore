<?php
echo "<script type='text/javascript'>
        var numberListNew = '" . sizeof($listNew) . "';
      </script>";
?>
<div id="manage-new">
    <h4>
        QUẢN LÝ SẢN PHẨM MỚI
    </h4>
    <div class="success-update">
        <?php echo (isset($_SESSION['updateVisibleNewSuccess']) ? $_SESSION['updateVisibleNewSuccess'] : ''); ?>
    </div>
    <div class="content">
        <form id="formUpdageNew" method="post" action="<?php echo baseUrl('product/updateVisibleNew'); ?>">
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
                <?php for ($i = 0; $i < sizeof($listNew); $i++) :
                    if ($listNew[$i]['visibleOnHome'] == "1") {
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
                        <td class="c2"><a href="<?php echo baseUrl('product/index/' . $listNew[$i]['idMobile']); ?>"><?php echo $listNew[$i]['tenDienThoai']; ?></a></td>
                        <td class="c3"><img src="<?php echo BASE_URL . $listNew[$i][0]; ?>" alt=""></td>
                        <td class="c4"><?php echo $listNew[$i]['mauSac']; ?></td>
                        <td class="c4"><?php echo $listNew[$i]['boNhoTrong']; ?>Gb</td>
                        <td class="c4"><?php echo formatPrice($listNew[$i]['giaNhap']); ?></td>
                        <td class="c5"><?php echo formatPrice($listNew[$i]['giaBan']); ?></td>
                        <td class="c6"><input class="cb-<?php echo $i; ?>" type="checkbox" name="visibleOnHomeBase<?php echo $listNew[$i]['idMobile']; ?>"></td>

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
if (isset($_SESSION['updateVisibleNewSuccess'])) {
    unset($_SESSION['updateVisibleNewSuccess']);
}
?>