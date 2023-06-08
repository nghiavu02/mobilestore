<?php
//pretty($mobiles);
$numberNhaSX = sizeof($nhaSX);

?>
<div id="manufacturer-list">
<div class="addSuccess">
        <?php echo isset($_SESSION['deleteManufacturerSuccess']) ? $_SESSION['deleteManufacturerSuccess'] : '';
        ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['deleteManufacturerFail']) ? $_SESSION['deleteManufacturerFail'] : '';
        ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['deleteManufacturerFails']) ? $_SESSION['deleteManufacturerFails'] : '';
        ?>
    </div>
    <div class="addSuccess">
        <?php echo isset($_SESSION['saveManufacturerSuccess']) ? $_SESSION['saveManufacturerSuccess'] : '';
        ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['saveManufacturerFail']) ? $_SESSION['saveManufacturerFail'] : '';
        ?>
    </div>
    <div class="addSuccess">
        <?php echo isset($_SESSION['addNewManufacturerSuccess']) ? $_SESSION['addNewManufacturerSuccess'] : ''; ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['addNewManufacturerFail']) ? $_SESSION['addNewManufacturerFail'] : ''; ?>
    </div>
    <div class="top-menu">
    <?php if (getAction() == "list"): ?>
        <h4>
            Danh sách tất cả nhà sản xuất (Tổng số: <?php echo $numberNhaSX; ?> nhà sản xuất)
        </h4>
    <?php endif; ?>
        <div class="modal">

        </div>
        <div class="add-new">
            <a href="<?php echo baseUrl('manufacturer/add'); ?>" class="btn btn-success">Thêm mới</a>
        </div>
    </div>
    <div class="list-item">
        <table class="table">
            <tr>
                <th class="c1">STT</th>
                <th class="c2">Tên nhà sản xuất</th>
                <th class="c3">Địa chỉ</th>
                <th class="c4">Điện thoại</th>
                <th class="c5">Mô tả</th>
            </tr>
            <?php for ($i = 0; $i < $numberNhaSX; $i++):
                ?>
                <tr>
                    <td class="c1"><?php echo $i + 1; ?></td>
                    <td class="c2">
                        <a href="<?php echo baseUrl('manufacturer/edit/' . $nhaSX[$i]['idNhaSanXuat']); ?>">
                            <?php echo $nhaSX[$i]['tenNhaSX']; ?>
                        </a>
                    </td>
                    <td class="c3"><?php echo $nhaSX[$i]['diaChi']; ?></td>
                    <td class="c4"><?php echo $nhaSX[$i]['dienThoai']; ?></td>
                    <td class="c5"><?php echo $nhaSX[$i]['moTa']; ?></td>
                    <td class="c6">
                    <a href="<?php echo baseUrl('manufacturer/deleteManufacturer/' . $nhaSX[$i]['idNhaSanXuat']); ?>">
                        <button class="btn btn-danger">
                            Xóa
                        </button>
                    </a>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>
<?php
if (isset($_SESSION['addNewManufacturerSuccess'])) {
    unset($_SESSION['addNewManufacturerSuccess']);
}
if (isset($_SESSION['addNewManufacturerFail'])) {
    unset($_SESSION['addNewManufacturerFail']);
}
if (isset($_SESSION['saveManufacturerSuccess'])) {
    unset($_SESSION['saveManufacturerSuccess']);
}
if (isset($_SESSION['saveManufacturerFail'])) {
    unset($_SESSION['saveManufacturerFail']);
}
if (isset($_SESSION['deleteManufacturerSuccess'])) {
    unset($_SESSION['deleteManufacturerSuccess']);
}
if (isset($_SESSION['deleteManufacturerFail'])) {
    unset($_SESSION['deleteManufacturerFail']);
}
if (isset($_SESSION['deleteManufacturerFails'])) {
    unset($_SESSION['deleteManufacturerFails']);
}
?>