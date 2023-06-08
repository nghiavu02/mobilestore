<?php
// pretty($allOrderDetails);
// pretty($donHang);
// pretty($khachHang);
date_default_timezone_set('asia/ho_chi_minh');
$date = date('m/d/Y h:i:s a', time());
if (($_SESSION['chucvuNV'] === "Nhân viên thủ kho") && ($donHang['trangThaiDonHang'] !== "đang giao hàng")) {
    $show = true;
} else {
    $show = false;
}
?>
<div id="order-details">
    <div class="title">
        <h4>Thông tin chi tiết đơn hàng</h4>
        <div class="successAssign">
            <?php echo isset($_SESSION['successAssign']) ? $_SESSION['successAssign'] : ''; ?>
        </div>
        <div class="failAssign">
            <?php echo isset($_SESSION['failAssign']) ? $_SESSION['failAssign'] : ''; ?>
        </div>
    </div>
    <div id="hoadon">
        <?php if ($_SESSION['chucvuNV'] === "Nhân viên thủ kho") : ?>
            <div style="padding: 20px 30px 0 30px;">
                <h4 style="text-align: center;margin-bottom:0px;font-weight:bold;color:black;">HÓA ĐƠN BÁN LẺ</h4>
                <div style="display: flex;justify-content: space-between;">
                    <div>Công ty TNHH MobileShop</div>
                    <div>Thời gian: <?php echo $date; ?></div>
                </div>
            </div>
        <?php endif; ?>
        <div class="wrap" style="margin: 20px;background: white; border: 3px dashed #ccc; padding: 10px; border-radius: 20px;">
            <h5 style="text-align: center;	color: black;	font-weight: bold;	background: gainsboro;">Thông tin khách hàng</h5>
            <table class="table">
                <tr>
                    <td>Tên khách hàng:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $khachHang['tenKhachHang']; ?>
                    </th>
                    <td>Số điện thoại:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $khachHang['soDienThoai']; ?>
                    </th>
                </tr>
                <tr>
                    <td>Email:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $khachHang['email']; ?>
                    </th>
                    <td>Địa chỉ:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $khachHang['diaChi']; ?>
                    </th>
                </tr>
            </table>
        </div>
        <div class="wrap" style="margin: 20px;background: white; border: 3px dashed #ccc; padding: 10px; border-radius: 20px;">
            <h5 style="text-align: center;	color: black;	font-weight: bold;	background: gainsboro;">Thông tin đơn hàng hàng</h5>
            <table class="table">
                <tr>
                    <td>Mã đơn hàng:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $donHang['idDonHang']; ?>
                    </th>
                    <td>Loại đơn hàng:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $donHang['loaiDonHang']; ?>
                    </th>
                </tr>
                <tr>
                    <td>Ngày tạo:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $donHang['ngayTao']; ?>
                    </th>
                    <td>Tổng tiền:</td>
                    <th class="content totalPrice" style="font-size: 20px;
                        color: red;
                        font-weight: bold;
                        font-style: italic;">
                        <?php echo formatPrice($donHang['tongTien']); ?>
                    </th>
                </tr>
                <tr>
                    <td>Địa chỉ giao hàng:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $donHang['diaChiNhanHang']; ?>
                    </th>
                    <td>Trạng thái:</td>
                    <th class="content" style="color: black;font-weight: bold;">
                        <?php echo $donHang['trangThaiDonHang']; ?>
                    </th>
                </tr>
                <?php if (($donHang['trangThaiDonHang'] === "đang giao hàng") || ($donHang['trangThaiDonHang'] === "đã thanh toán")) :
                    $nvgiaohang = getObjectById('nhanvien', 'idNhanVien', $donHang['nhanvien_idNhanVien']);
                ?>
                    <tr>
                        <td>Nhân viên giao hàng:</td>
                        <th class="content" style="color: black;font-weight: bold;">
                            <?php echo $nvgiaohang['tenNhanVien']; ?>
                        </th>
                        <td>Số điện thoại nhân viên:</td>
                        <th><?php echo $nvgiaohang['soDienThoai']; ?></th>
                    </tr>
                <?php endif; ?>
                <?php if ($donHang['trangThaiDonHang'] === "đã thanh toán") :
                ?>
                    <tr>
                        <td>Ngày thanh toán:</td>
                        <th class="content" style="color: black;font-weight: bold;">
                            <?php echo $donHang['ngayThanhToan']; ?>
                        </th>
                        <td></td>
                        <th></th>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
        <div class="wrap" style="margin: 20px;background: white; border: 3px dashed #ccc; padding: 10px; border-radius: 20px;">
            <h5 style="text-align: center;	color: black;	font-weight: bold;	background: gainsboro;">Danh sách mặt hàng trong đơn hàng</h5>
            <table class="table">
                <tr>
                    <th class="stt" style="width: 1%;">ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>
                <?php for ($j = 0; $j < sizeof($allOrderDetails); $j++) :
                    $mobile = getObjectById('mobile', 'idMobile', $allOrderDetails[$j]['mobile_idMobile']);
                    linkImageAndMobile($mobile, getBaseImage($mobile['idMobile']), []);
                ?>
                    <tr>
                        <td class="chitiet stt" style="width: 1%;"><?php echo $allOrderDetails[$j]['idChiTiet']; ?></td>
                        <td class="chitiet" style="width: 10%;">
                            <a target="_blank" href="<?php echo baseUrl('product/index/' . $mobile['idMobile']); ?>">
                                <?php echo $mobile['tenDienThoai']; ?>
                            </a>
                        </td>
                        <td class="chitiet" style="width: 10%;"><img style="width: 40px;" src="<?php echo BASE_URL . $mobile[0]; ?>" alt=""></td>
                        <td class="chitiet" style="width: 10%;"><?php echo $allOrderDetails[$j]['soLuong']; ?></td>
                        <td class="chitiet price" style="width: 10%;color: green;font-weight: bold;font-style: italic;"><?php echo formatPrice($allOrderDetails[$j]['thanhTien']); ?></td>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>
        <?php if ($_SESSION['chucvuNV'] === "Nhân viên thủ kho") : ?>
            <?php if ($donHang['trangThaiDonHang'] === "đang giao hàng") : ?>
                <div style="display:flex;justify-content:space-between">
                    <div style="text-align:center;width: 300px;height: 100px;margin-left: 20px;">
                        Nhân viên giao hàng ký tên: <br />
                        <span style="color: black"><?php echo $nvgiaohang['tenNhanVien']; ?></span>
                    </div>
                    <div style="text-align:center;width:300px;height:100px;margin-right:30px;">
                        Nhân viên thủ kho ký tên: <br />
                        <span style="color:black;"> <?php echo $_SESSION['nameNV']; ?></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if ($_SESSION['chucvuNV'] === "Nhân viên thủ kho") : ?>
        <?php if ($donHang['trangThaiDonHang'] === "đang giao hàng") : ?>
            <div style="text-align: center;">
                <button onclick="generatePDF()" id="createPdf" type="button" class="btn btn-success">Xuất hóa đơn</button>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($show) : ?>
        <div class="phancong" style="margin: 20px;background: lavender;border: 3px dashed #ccc;padding: 10px;border-radius: 20px;">
            <h4 style="text-align: center;	color: black;font-weight: bold;">Phân công giao hàng</h4>
            <form id="formGiaoViec" method="post" action="<?php echo baseUrl('order/assign'); ?>">
                <input type="hidden" name="idOrder" value="<?php echo $donHang['idDonHang']; ?>">
                <table class="table">
                    <tr style="text-align: center;">
                        <th class="col1" style="width: 20%;	font-size: 20px;">Chọn nhân viên</th>
                        <th>
                            <select class="selectShipper" name="selectShipper" id="selectShipper">
                                <?php $allShipper = getAllShipper();
                                for ($k = 0; $k < sizeof($allShipper); $k++) :
                                ?>
                                    <option value="<?php echo $allShipper[$k]['idNhanVien']; ?>">
                                        <?php echo $allShipper[$k]['tenNhanVien']; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </th>
                        <th>
                            <button type="submit" class="btn btn-success">Giao việc</button>
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    <?php endif; ?>
</div>

<?php
if (isset($_SESSION['successAssign'])) {
    unset($_SESSION['successAssign']);
}

if (isset($_SESSION['failAssign'])) {
    unset($_SESSION['failAssign']);
}

?>