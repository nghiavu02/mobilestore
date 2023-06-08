<?php
if (getAction() === "edit") {
    echo "<script type='text/javascript'>
        var controller = '" . getModule() . "';
        var id = " . $manufacturer['idNhaSanXuat'] . ";
        var ten = '" . $manufacturer['tenNhaSX'] . "';
        var diachi = '" . $manufacturer['diaChi'] . "';
        var dienthoai = '" . $manufacturer['dienThoai'] . "';
        var moTa = '" . $manufacturer['moTa'] . "';
    </script>";
}
?>
<div id="edit-manufacturer">
    <h4>
        Sửa thông tin nhà sản xuất
    </h4>
    <div class="content">
        <form id="saveEditManufacturer" enctype="multipart/form-data" method="post" action="<?php echo baseUrl('manufacturer/saveEdit'); ?>">
            <input type="hidden" name="idNhaSanXuat" value="<?php echo $manufacturer['idNhaSanXuat']; ?>">
            <table class="table">
                <tr>
                    <th class="col1">Tên nhà sản xuất</th>
                    <th class="detail">
                        <input type="text" class="enameManufacturer" name="eten" autocomplete="off" required>
                        <div class="searchManufacturer"></div>
                    </th>
                </tr>
                <tr>
                    <th class="col1">Địa chỉ</th>
                    <th class="detail">
                        <input type="text" class="ediachi" name="ediachi" autocomplete="off" required>
                    </th>
                </tr>
                <tr>
                    <th class="col1">Số điện thoại</th>
                    <th class="detail">
                        <input type="text" class="edienthoai" name="edienthoai" autocomplete="off" required>
                    </th>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td class="detail">
                        <textarea class="emota" form="saveEditManufacturer" rows="4" cols="50" name="emota" required></textarea>
                    </td>
                </tr>
            </table>
            <div class="submit">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="<?php echo baseUrl('manufacturer/list'); ?>" type="button" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>
