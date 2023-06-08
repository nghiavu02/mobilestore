<?php
if (getAction() === "edit") {
    echo "<script type='text/javascript'>
        var controller = '" . getModule() . "';
        var id = " . $supplier['idNhaCungCap'] . ";
        var ten = '" . $supplier['tenNhaCC'] . "';
        var diachi = '" . $supplier['diaChi'] . "';
        var dienthoai = '" . $supplier['dienThoai'] . "';
        var moTa = '" . $supplier['moTa'] . "';
    </script>";
}
?>
<div id="edit-supplier">
    <h4>
        Sửa thông tin nhà cung cấp
    </h4>
    <div class="content">
        <form id="saveEditSupplier" enctype="multipart/form-data" method="post" action="<?php echo baseUrl('supplier/saveEdit'); ?>">
            <input type="hidden" name="idNhaCungCap" value="<?php echo $supplier['idNhaCungCap']; ?>">
            <table class="table">
                <tr>
                    <th class="col1">Tên nhà cung cấp</th>
                    <th class="detail">
                        <input type="text" class="enameSupplier" name="eten" autocomplete="off" required>
                        <div class="searchSupplier"></div>
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
                        <textarea class="emota" form="saveEditSupplier" rows="4" cols="50" name="emota" required></textarea>
                    </td>
                </tr>
            </table>
            <div class="submit">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="<?php echo baseUrl('supplier/list'); ?>" type="button" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>
