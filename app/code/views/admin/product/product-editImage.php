<?php
// pretty($mobile);
?>
<div id="editImage">
    <h4>
        Trang cập nhật ảnh cho điện thoại <strong>" <?php echo $mobile['tenDienThoai']; ?> "</strong>
    </h4>
    <div class="content">
        <form method="post" enctype="multipart/form-data" action="<?php echo baseUrl('product/saveEditImage'); ?>">
        <input type="hidden" name="idProduct" value="<?php echo $mobile['idMobile']; ?>">
        <input type="hidden" name="nameProduct" value="<?php echo $mobile['tenDienThoai']; ?>">
            <table class="table">
                <tr>
                    <th class="col1">Ảnh chính</th>
                    <td class="img logo">
                        <input type="file" class="file elogo" name="elogo" accept="image/*" onchange="validateLogo(this)" required>
                        <div class="note"> Kích thước: 600x600</div>
                    </td>
                </tr>
                <tr>
                    <th class="col1">Ảnh phụ</th>
                    <td class="img">
                        1. <input type="file" class="file eanh1" name="eanh1" accept="image/*" onchange="validateImg(this)" required>
                        2. <input type="file" class="file eanh2" name="eanh2" accept="image/*" onchange="validateImg(this)" required>
                        <br>
                        3. <input type="file" class="file eanh3" name="eanh3" accept="image/*" onchange="validateImg(this)" required>
                        4. <input type="file" class="file eanh4" name="eanh4" accept="image/*" onchange="validateImg(this)" required>
                        <div class="note">
                            Kích thước: 1020x680
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="<?php echo baseUrl('product/index/' . $mobile['idMobile']); ?>" class="btn btn-danger">Hủy bỏ</a>
        </form>
    </div>
</div>