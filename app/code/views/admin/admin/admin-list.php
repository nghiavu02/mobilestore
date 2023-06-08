<div class="admin-list">
    <h4>Danh sách các quản trị viên của website</h4>
    <div class="content">
        <table class="table">
            <tr>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Quê quán</th>
                <th>Điện thoại</th>
                <th>Chức vụ</th>
                <th>Trạng thái</th>
            </tr>
            <?php for ($i = 0; $i < sizeof($admins); $i++):
                switch ($admins[$i]['status']) {
                    case 2:
                        $status = "Bị vô hiệu hóa";
                        break;
                    case 0 :
                        $status = "Chưa kích hoạt";
                        break;
                    case 1:
                        $status = "Đã kích hoạt";
                        break;
                }
                ?>
                <tr class="admin-<?php echo $admins[$i]['idNhanVien']; ?>">
                    <td><a href="<?php echo baseUrl('admin/index/') . $admins[$i]['idNhanVien']; ?>">
                            <?php echo $admins[$i]['tenNhanVien']; ?>
                        </a>
                    </td>
                    <td><?php echo $admins[$i]['gioiTinh']; ?></td>
                    <td><?php echo $admins[$i]['ngaySinh']; ?></td>
                    <td><?php echo $admins[$i]['queQuan']; ?></td>
                    <td><?php echo $admins[$i]['soDienThoai']; ?></td>
                    <td><?php echo $admins[$i]['chucvu']; ?></td>
                    <td><?php echo $status; ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>