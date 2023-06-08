<?php


class Order_Controller extends Base_Controller
{

    // Xử lý tạo đơn mua hàng và chi tiết mua hàng khi khách đặt hàng
    public function checkout()
    {
        // Tạo mới 1 đơn hàng
        $diaChiNhanHang = isset($_POST['dcGiaoHang']) ? $_POST['dcGiaoHang'] : '';
        $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : 0;
        $idDonHang = $this->model->donmuahang->createNewOrder($diaChiNhanHang, $totalPrice);
        // Lấy về các chi tiết đặt hàng của người dùng hiện tại
        $arrayCTDat = $this->model->giohang_has_mobile->getAll('giohang_has_mobile', 'giohang_khachhang_idKhachHang', $_SESSION['idUser']);
        // Tạo mới các chi tiết mua hàng tương ứng với các chi tiết đặt hàng
        for ($i = 0; $i < sizeof($arrayCTDat); $i++) {
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $arrayCTDat[$i]['mobile_idMobile']);
            $soLuong = $arrayCTDat[$i]['soLuong'];
            $price = $soLuong * ($mobile['giaBan'] - $mobile['giamGia']);
            // Tạo mới chi tiết mua
            $this->model->chitietmuahang->createNewDetail($soLuong, $price, $idDonHang, $mobile['idMobile']);
        }
        // Xóa hết các chi tiết đặt hàng của người dùng hiện tại
        $this->model->giohang_has_mobile->deleteAll('giohang_has_mobile', 'giohang_khachhang_idKhachHang', $_SESSION['idUser']);
        // Gửi mail thông báo đơn hàng tới khách hàng

        $title = "MobileShop | Đơn đặt hàng";
        $content = "Hà Nội, " . date('Y-m-d H-i-s') . "<br />";
        $content .= "Xin chào " . $_SESSION['username'] . ",<br /><br />";
        $content .= "Chúng tôi nhận được đơn đặt mua hàng của bạn gửi về MobileShop. <br />";
        $content .= "Dưới đây là thông tin đơn hàng của bạn: <br />";
        $content .= "<table style='border: 1px solid black; min-width: 500px; text-align: center;'>";
        $content .= "<tr><th>Tên điện thoại</th><th>Số lượng</th><th>Giá tiền</th></tr>";
        for ($j = 0; $j < sizeof($arrayCTDat); $j++) {
            $mobile = $this->model->mobile->getById('mobile', 'idMobile', $arrayCTDat[$j]['mobile_idMobile']);
            $soLuong = $arrayCTDat[$j]['soLuong'];
            $price = $soLuong * ($mobile['giaBan'] - $mobile['giamGia']);
            $row = "<tr>";
            $row .= "<td style='color: blue'>" . $mobile['tenDienThoai'] . "</td>";
            $row .= "<td>" . $soLuong . "</td>";
            $row .= "<td>" . formatPrice($price) . "</td>";
            $row .= "</tr>";
            $content .= $row;
        }
        $content .= "</table>";
        $content .= "<p>Tổng giá tiền của đơn hàng là: <span style='font-size: 20px; font-weight: bold; color: red;'>" . formatPrice($totalPrice) . "</span><br />";
        $content .= "Chúng tôi sẽ giao hàng sớm nhất có thể tới địa chỉ : <span style='font-weight: bold;'>" . $_POST['dcGiaoHang'] . "</span>.<br />";
        $content .= "Địa chỉ liên hệ: MobileShop Số 1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội. Hotline: 0965 351 741. <br />";
        $content .= "Xin chân thành cảm ơn !";
        $nTo = $_SESSION['username'];
        $mTo = $_SESSION['email'];
        $diachicc = "shopnamhoang@gmail.com";
        $mailSuccess = sendMail($title, $content, $nTo, $mTo, $diachicc);
        // Chuyển tới trang thông báo đặt hàng thành công
        redirect('order/success');
    }

    // Trang thông báo đặt hàng thành công
    public function success()
    {
        $this->view->load('frontend/order/success');
    }
}