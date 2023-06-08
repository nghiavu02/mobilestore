<div id="add-new-mobile">
    <h4>
        Thêm mới điện thoại
    </h4>
    <div class="content">
        <form id="addProduct" enctype="multipart/form-data" method="post"
              action="<?php echo baseUrl('product/save'); ?>">
            <table class="table">
                <tr>
                    <th class="col1">Tên điện thoại</th>
                    <th class="detail">
                        <input type="text" class="namePhone" name="ten" autocomplete="off" required>
                        <div class="searchProduct"></div>
                    </th>
                </tr>
                <tr>
                    <th class="col1">Ảnh chính</th>
                    <td class="img logo">
                        <input type="file" class="file logo" name="logo" accept="image/*"
                               onchange="validateLogo(this)" required>
                        <div class="note"> Kích thước: 600x600</div>
                    </td>
                </tr>
                <tr>
                    <th class="col1">Ảnh phụ</th>
                    <td class="img">
                        1. <input type="file" class="file anh1" name="anh1" accept="image/*"
                                  onchange="validateImg(this)" required>
                        2. <input type="file" class="file anh2" name="anh2" accept="image/*"
                                  onchange="validateImg(this)" required>
                        <br>
                        3. <input type="file" class="file anh3" name="anh3" accept="image/*"
                                  onchange="validateImg(this)" required>
                        4. <input type="file" class="file anh4" name="anh4" accept="image/*"
                                  onchange="validateImg(this)" required>
                        <div class="note">
                            Kích thước: 1020x680
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <th>Màu sắc</th>
                    <th class="detail"><input type="text" name="mausac" autocomplete="off" required></th>
                    <th>Số lượng trong kho</th>
                    <th class="detail"><input type="number" name="soluong" autocomplete="off" value="0" readonly></th>
                </tr>
                <tr>
                    <th>Giá nhập</th>
                    <th class="detail"><input class="giaNhap" type="number" name="gianhap" autocomplete="off" required>
                    </th>
                    <th>Giá bán</th>
                    <th class="detail"><input class="giaBan" type="number" name="giaban" autocomplete="off" required>
                    </th>
                </tr>
                <tr>
                    <th>Giảm giá</th>
                    <th class="detail"><input class="giamGia" type="number" name="giamgia" autocomplete="off" required>
                    </th>
                    <th>Ngày nhập kho</th>
                    <th class="detail"><input type="date" name="ngaynhapkho" autocomplete="off" readonly></th>
                </tr>
                <tr>
                    <th>CPU</th>
                    <th class="detail"><input type="text" name="cpu" autocomplete="off" required></th>
                    <th>GPU</th>
                    <th class="detail"><input type="text" name="gpu" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>RAM</th>
                    <th class="detail"><input type="number" name="ram" autocomplete="off" required></th>
                    <th>Bộ nhớ trong</th>
                    <th class="detail"><input type="number" name="bonhotrong" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>Hệ điều hành</th>
                    <th class="detail"><input type="text" name="hedieuhanh" autocomplete="off" required></th>
                    <th>Màn hình</th>
                    <th class="detail"><input type="text" name="manhinh" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>Camera sau</th>
                    <th class="detail"><input type="text" name="camerasau" autocomplete="off" required></th>
                    <th>Camera trước</th>
                    <th class="detail"><input type="text" name="cameratruoc" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>Dung lượng PIN</th>
                    <th class="detail"><input type="number" name="pin" autocomplete="off" required></th>
                    <th>Công nghệ sạc PIN</th>
                    <th class="detail"><input type="text" name="sacpin" autocomplete="off" required></th>
                </tr>
                <tr>
                    <th>SIM</th>
                    <th class="detail"><input type="text" name="sim" autocomplete="off" required></th>
                    <th>Công nghệ 4G</th>
                    <td class="detail">
                        <select class="cn4g" name="4g" id="">
                            <option>Có</option>
                            <option>Không</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Số sao</th>
                    <th class="detail"><input type="number" name="sosao" value="0" readonly></th>
                    <th>Thể loại</th>
                    <td class="detail">
                        <select class="theloai" name="theloai" id="">
                            <?php for ($i = 0; $i < sizeof($listTheloai); $i++): ?>
                                <option>
                                    <?php echo $listTheloai[$i]['tentheloai']; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Hãng sản xuất</th>
                    <td class="detail">
                        <select class="nsx" name="nhasanxuat" id="">
                            <?php for ($i = 0; $i < sizeof($listNSX); $i++): ?>
                                <option>
                                    <?php echo $listNSX[$i]['tenNhaSX']; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td class="detail">
                        <textarea form="addProduct" rows="4" cols="50" name="mota" required></textarea>
                    </td>
                </tr>
            </table>
            <div class="submit">
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </form>
    </div>
</div>
