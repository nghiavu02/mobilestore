<div class="stocker-list">
    <h4>Danh sách nhân viên thủ kho của website</h4>
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
            <?php for ($i = 0; $i < sizeof($stockers); $i++):
                switch ($stockers[$i]['status']) {
                    case 2:
                        $tatus = "Bị vô hiệu hóa";
                        break;
                    case 0 :
                        $status = "Chưa kích hoạt";
                        break;
                    case 1:
                        $status = "Đã kích hoạt";
                        break;
                }
                ?>
                <tr class="admin-<?php echo $stockers[$i]['idNhanVien']; ?>">
                    <td><a href="<?php echo baseUrl('stocker/index/') . $stockers[$i]['idNhanVien']; ?>">
                            <?php echo $stockers[$i]['tenNhanVien']; ?>
                        </a>
                    </td>
                    <td><?php echo $stockers[$i]['gioiTinh']; ?></td>
                    <td><?php echo $stockers[$i]['ngaySinh']; ?></td>
                    <td><?php echo $stockers[$i]['queQuan']; ?></td>
                    <td><?php echo $stockers[$i]['soDienThoai']; ?></td>
                    <td><?php echo $stockers[$i]['chucvu']; ?></td>
                    <td><?php echo $status; ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>