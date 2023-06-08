<?php

?>
<div id="mobile-detail">
    <h4>
        Thông tin chi tiết sản phẩm
    </h4>
    <div class="addSuccess">
        <?php echo isset($_SESSION['saveMobileSuccess']) ? $_SESSION['saveMobileSuccess'] : '';
        ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['saveMobileFail']) ? $_SESSION['saveMobileFail'] : '';
        ?>
    </div>
    <div class="updateImageSuccess">
        <?php echo isset($_SESSION['updateImageSuccess']) ? $_SESSION['updateImageSuccess'] : '';
        ?>
    </div>
    <div class="updateImageFail">
        <?php echo isset($_SESSION['updateImageFail']) ? $_SESSION['updateImageFail'] : '';
        ?>
    </div>
    <div class="content">
        <table class="table">
            <tr>
                <th class="col1">Tên điện thoại</th>
                <th class="detail"><?php echo $mobile['tenDienThoai']; ?></th>
            </tr>
            <tr>
                <th class="col1">Ảnh chính</th>
                <td class="img img1"><img src="<?php echo BASE_URL . $mobile[0]; ?>"></td>
            </tr>
            <tr>
                <th class="col1">Ảnh phụ</th>
                <td class="img">
                    <img src="<?php echo BASE_URL . $mobile[1]; ?>">
                    <img src="<?php echo BASE_URL . $mobile[2]; ?>">
                    <img src="<?php echo BASE_URL . $mobile[3]; ?>">
                    <img src="<?php echo BASE_URL . $mobile[4]; ?>">
                </td>
            </tr>
            <tr>
                <th>Màu sắc</th>
                <th class="detail"><?php echo $mobile['mauSac']; ?></th>
            </tr>
            <tr>
                <th>Số lượng trong kho</th>
                <th class="detail"><?php echo $mobile['soLuongTrongKho']; ?></th>
            </tr>
            <tr>
                <th>Ngày nhập kho</th>
                <th class="detail"><?php echo $mobile['ngayNhapKho']; ?></th>
            </tr>
            <tr>
                <th>Giá nhập</th>
                <th class="detail"><?php echo formatPrice($mobile['giaNhap']); ?></th>
            </tr>
            <tr>
                <th>Giá bán</th>
                <th class="detail"><?php echo formatPrice($mobile['giaBan']); ?></th>
            </tr>
            <tr>
                <th>Giảm giá</th>
                <th class="detail"><?php echo formatPrice($mobile['giamGia']); ?></th>
            </tr>
            <tr>
                <th>CPU</th>
                <th class="detail"><?php echo $mobile['CPU']; ?></th>
            </tr>
            <tr>
                <th>GPU</th>
                <th class="detail"><?php echo $mobile['gpu']; ?></th>
            </tr>
            <tr>
                <th>RAM</th>
                <th class="detail"><?php echo $mobile['RAM'] . " GB"; ?></th>
            </tr>
            <tr>
                <th>Bộ nhớ trong</th>
                <th class="detail"><?php echo $mobile['boNhoTrong'] . " GB"; ?></th>
            </tr>
            <tr>
                <th>Hệ điều hành</th>
                <th class="detail"><?php echo $mobile['heDieuHanh']; ?></th>
            </tr>
            <tr>
                <th>Màn hình</th>
                <th class="detail"><?php echo $mobile['manHinh']; ?></th>
            </tr>
            <tr>
                <th>Camera sau</th>
                <th class="detail"><?php echo $mobile['cameraSau']; ?></th>
            </tr>
            <tr>
                <th>Camera trước</th>
                <th class="detail"><?php echo $mobile['cameraTruoc']; ?></th>
            </tr>
            <tr>
                <th>Dung lượng PIN</th>
                <th class="detail"><?php echo $mobile['dungLuongPin'] . " mAh"; ?></th>
            </tr>
            <tr>
                <th>Công nghệ sạc PIN</th>
                <th class="detail"><?php echo $mobile['sacNhanh']; ?></th>
            </tr>
            <tr>
                <th>SIM</th>
                <th class="detail"><?php echo $mobile['SIM']; ?></th>
            </tr>
            <tr>
                <th>Công nghệ 4G</th>
                <th class="detail"><?php echo $mobile['4G'] == 1 ? "Có" : "Không"; ?></th>
            </tr>
            <tr>
                <th>Số sao</th>
                <th class="detail"><?php echo $mobile['soSao']; ?></th>
            </tr>
            <tr>
                <th>Mô tả</th>
                <th class="detail"><?php echo $mobile['moTa']; ?></th>
            </tr>
            <tr>
                <th>Hãng sản xuất</th>
                <th class="detail"><?php echo getNameManufacturer($mobile['NhaSanXuat_idNhaSanXuat']); ?></th>
            </tr>
            <tr>
                <th>Nhà cung cấp</th>
                <th class="detail"><?php echo isset($mobile['NhaCungCap_idNhaCungCap']) ? getNameSupplier($mobile['NhaCungCap_idNhaCungCap']) : ''; ?></th>
            </tr>
            <tr>
                <th>Thể loại</th>
                <th class="detail"><?php echo getNameCategory($mobile['theloai_idTheloai']); ?></th>
            </tr>
        </table>
        <a href="<?php echo baseUrl('product/edit/' . $mobile['idMobile']) ?>" class="btn btn-success">Cập nhật thông tin</a>
        <a href="<?php echo baseUrl('product/editImage/' . $mobile['idMobile']) ?>" class="btn btn-info">Cập nhật hình ảnh</a>
    </div>
</div>
<?php
if (isset($_SESSION['saveMobileSuccess'])) {
    unset($_SESSION['saveMobileSuccess']);
}
if (isset($_SESSION['saveMobileFail'])) {
    unset($_SESSION['saveMobileFail']);
}
if (isset($_SESSION['updateImageSuccess'])) {
    unset($_SESSION['updateImageSuccess']);
}
if (isset($_SESSION['updateImageFail'])) {
    unset($_SESSION['updateImageFail']);
}
?>