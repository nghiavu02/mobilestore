<div id="add-new-category">
    <h4>
        Thêm mới thể loại
    </h4>
    <div class="content">
        <form id="addCategory" enctype="multipart/form-data" method="post"
              action="<?php echo baseUrl('category/save'); ?>">
            <table class="table">
                <tr>
                    <th class="col1">Tên thể loại</th>
                    <th class="detail">
                        <input type="text" class="nameCategory" name="ten" autocomplete="off" placeholder="Tên thể loại" required>
                        <div class="searchCategory"></div>
                    </th>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td class="detail">
                        <textarea form="addCategory" rows="4" cols="50" name="mota" required></textarea>
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
