<?php
//pretty($mobiles);
$numberProducts = sizeof($mobiles);

?>
<div id="product-list">
    <?php if (getAction() == "list") : ?>
        <h4>
            Danh sách tất cả sản phẩm (Tổng số: <?php echo $numberProducts; ?> sản phẩm)
        </h4>
    <?php else : ?>
        <h4>
            Tìm thấy <?php echo $numberProducts; ?> sản phẩm với từ khóa "<?php echo $key; ?>" :
        </h4>
    <?php endif; ?>
    <div class="addSuccess">
        <?php echo isset($_SESSION['addNewMobileSuccess']) ? $_SESSION['addNewMobileSuccess'] : ''; ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['addNewMobileFail']) ? $_SESSION['addNewMobileFail'] : ''; ?>
    </div>
    <div class="top-menu">
        <div class="search">
            <form id="search" method="post" action="<?php echo baseUrl('product/search') ?>">
                <input id="searchProduct" type="text" name="searchProduct" class="">
                <button id="btnSubmit" class="btn btn-info">Tìm kiếm</button>
            </form>
        </div>
        <div class="modal">

        </div>
        <div class="add-new">
            <a href="<?php echo baseUrl('product/add'); ?>" class="btn btn-success">Thêm mới</a>
        </div>
    </div>
    <div class="list-item">
        <table class="table">
            <tr>
                <th class="c1">STT</th>
                <th class="c2">Tên điện thoại</th>
                <th class="c3">Ảnh</th>
                <th class="c4">Màu sắc</th>
                <th class="c5">Giá nhập</th>
                <th class="c6">Giá bán</th>
                <th class="c7">Giảm giá</th>
                <th class="c8">Số lượng</th>
            </tr>
            <?php for ($i = 0; $i < $numberProducts; $i++) :
                $linkImage = BASE_URL . $mobiles[$i]['0'];
            ?>
                <tr>
                    <td class="c1"><?php echo $i + 1; ?></td>
                    <td class="c2">
                        <a href="<?php echo baseUrl('product/index/' . $mobiles[$i]['idMobile']); ?>">
                            <?php echo $mobiles[$i]['tenDienThoai']; ?>
                        </a>
                    </td>
                    <td class="c3"><img src="<?php echo $linkImage; ?>" alt=""></td>
                    <td class="c4"><?php echo $mobiles[$i]['mauSac']; ?></td>
                    <td class="c5"><?php echo formatPrice($mobiles[$i]['giaNhap']); ?></td>
                    <td class="c6"><?php echo formatPrice($mobiles[$i]['giaBan']); ?></td>
                    <td class="c7"><?php echo formatPrice($mobiles[$i]['giamGia']); ?></td>
                    <td class="c8"><?php echo $mobiles[$i]['soLuongTrongKho']; ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>
<?php
if (isset($_SESSION['addNewMobileSuccess'])) {
    unset($_SESSION['addNewMobileSuccess']);
}
if (isset($_SESSION['addNewMobileFail'])) {
    unset($_SESSION['addNewMobileFail']);
}
?>