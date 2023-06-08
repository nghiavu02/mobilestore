<div id="add-new-manufacturer">
    <h4>
        Thêm mới nhà sản xuất
    </h4>
    <div class="content">
        <form id="addManufacturer" enctype="multipart/form-data" method="post"
              action="<?php echo baseUrl('manufacturer/save'); ?>">
            <table class="table">
                <tr>
                    <th class="col1">Tên nhà sản xuất</th>
                    <th class="detail">
                        <input type="text" class="nameManufacturer" name="ten" autocomplete="off" placeholder="Tên nhà sản xuất" required>
                        <div class="searchManufacturer"></div>
                    </th>
                </tr>
                <tr>
                    <th class="col1">Địa chỉ</th>
                    <th class="detail">
                        <input type="text" class="address" name="diachi" autocomplete="off" placeholder="Địa chỉ" required>
                        
                    </th>
                </tr>
                <tr>
                    <th class="col1">Số điện thoại</th>
                    <th class="detail">
                        <input type="text" class="numberphone" name="dienthoai" autocomplete="off" placeholder="0344213030" required>
                        
                    </th>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td class="detail">
                        <textarea form="addManufacturer" rows="4" cols="50" name="mota" required></textarea>
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