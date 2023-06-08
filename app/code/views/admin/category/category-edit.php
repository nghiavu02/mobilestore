<?php
if (getAction() === "edit") {
    echo "<script type='text/javascript'>
        var controller = '" . getModule() . "';
        var id = " . $category['idTheloai'] . ";
        var ten = '" . $category['tentheloai'] . "';
        var moTa = '" . $category['moTa'] . "';
    </script>";
}
?>
<div id="edit-category">
    <h4>
        Sửa thông tin thể loại
    </h4>
    <div class="content">
        <form id="saveEditCategory" enctype="multipart/form-data" method="post" action="<?php echo baseUrl('category/saveEdit'); ?>">
            <input type="hidden" name="idTheloai" value="<?php echo $category['idTheloai']; ?>">
            <table class="table">
                <tr>
                    <th class="col1">Tên thể loại</th>
                    <th class="detail">
                        <input type="text" class="enameCategory" name="eten" autocomplete="off" readonly required>
                        <div class="searchCategory"></div>
                    </th>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td class="detail">
                        <textarea class="emota" form="saveEditCategory" rows="4" cols="50" name="emota" required></textarea>
                    </td>
                </tr>
            </table>
            <div class="submit">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="<?php echo baseUrl('category/list'); ?>" type="button" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>
