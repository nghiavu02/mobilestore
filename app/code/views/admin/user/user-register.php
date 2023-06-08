<?php

?>

<div id="register-account">
    <h4>Tạo tài khoản quản trị viên mới hoặc tài khoản nhân viên mới:</h4>
    <form id="createAdminAccount" method="post" action="<?php echo baseUrl('user/createAccount'); ?>">
        <table class="table">
            <tr>
                <th>Tên người dùng:</th>
                <td><input type="text" name="r-username" required placeholder="name" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Tài khoản email:</th>
                <td>
                    <input id="r-email" type="email" name="r-email" required placeholder="email" autocomplete="off">
                    <div id="search-email">
                </td>
            </tr>
            <tr>
                <th>Giới tính:</th>
                <td>
                    <select name="r-gioitinh" id="">
                        <option>Nam</option>
                        <option>Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ngày sinh:</th>
                <td>
                    <input type="date" name="r-ngaysinh" required/>
                </td>
            </tr>
            <tr>
                <th>Quê quán:</th>
                <td>
                    <input type="text" name="r-address" required placeholder="address" autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Chứng minh nhân dân:</th>
                <td>
                    <input type="number" name="r-cmnd" required placeholder="cmnd" autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td>
                    <input type="number" name="r-phone" required placeholder="phone" autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Chức vụ:</th>
                <td>
                    <select name="r-chucvu" id="">
                        <option>Quản trị viên</option>
                        <option>Nhân viên bán hàng</option>
                        <option>Nhân viên thủ kho</option>
                        <option>Nhân viên giao hàng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ghi chú:</th>
                <td>
                    <input type="text" name="r-ghichu" required placeholder="note" autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <th>Trạng thái tài khoản:</th>
                <td>
                    <select name="r-status" id="">
                        <option>Đã kích hoạt</option>
                        <option>Chưa kích hoạt</option>
                        <option>Bị vô hiệu hóa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button type="submit" class="btn btn-success">
                        Tạo tài khoản
                    </button>
                    <button type="button" class="btn btn-danger" onclick="cancelCreateAccount()">
                        Hủy bỏ
                    </button>
                    <button type="button" class="btn btn-warning" onclick="resetForm()">
                        Reset
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>
