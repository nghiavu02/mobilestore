<?php
class Order_Controller extends Base_Controller
{
    public function listNotApprove()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listOrders = $this->model->donmuahang->getAllOrders(null, 'xuất hàng', 'chưa phê duyệt');
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listNotApprove', [
            'listOrders' => array_reverse($listOrders)
        ]);
    }

    public function listNotShipped()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listOrders = $this->model->donmuahang->getAllOrders($_SESSION['idNV'], 'xuất hàng', 'đang giao hàng');
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listNotShipped', [
            'listOrders' => array_reverse($listOrders)
        ]);
    }

    public function listAlreadyShipped()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listOrders = $this->model->donmuahang->getAllOrders($_SESSION['idNV'], 'xuất hàng', 'đã thanh toán');
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listAlreadyShipped', [
            'listOrders' => array_reverse($listOrders)
        ]);
    }


    public function listApproved()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listOrders = $this->model->donmuahang->getAllOrders(null, 'xuất hàng', 'đã phê duyệt');
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listApproved', [
            'listOrders' => ($listOrders)
        ]);
    }

    public function listShipping()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listOrders = $this->model->donmuahang->getAllOrders(null, 'xuất hàng', 'đang giao hàng');
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listShipping', [
            'listOrders' => array_reverse($listOrders)
        ]);
    }

    public function listAlreadyCheckout()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $listOrders = $this->model->donmuahang->getAllOrders(null, 'xuất hàng', 'đã thanh toán');
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-listAlreadyCheckout', [
            'listOrders' => array_reverse($listOrders)
        ]);
    }

    public function index()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $idOrder = intval($param[0]);
                // lay ve object don hang
                $donHang = $this->model->donmuahang->getById('donmuahang', 'idDonHang', $idOrder);
                // lay ve object khach hang
                $khachHang = $this->model->khachhang->getById('khachhang', 'idKhachHang', $donHang['khachhang_idKhachHang']);
                // lay ve tat ca chi tiet mua hang
                $allOrderDetails = $this->model->chitietmuahang->getAll('chitietmuahang', 'donmuahang_idDonHang', $idOrder);
                $this->layout->set('admin_default');
                $this->view->load('admin/order/order-index', [
                    'khachHang' => $khachHang,
                    'donHang' => $donHang,
                    'allOrderDetails' => $allOrderDetails
                ]);
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
    }

    public function approve()
    {
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $idOrder = intval($param[0]);
                $idNhanVien = $_SESSION['idNV'];
                $result = $this->model->donmuahang->approveOrder($idOrder);
                if ($result == true) {
                    $_SESSION['successApprove'] = "Phê duyệt đơn hàng có mã " . $idOrder . " thành công !";
                } else {
                    $_SESSION['failApprove'] = "Phê duyệt đơn hàng có mã " . $idOrder . " thất bại !";
                }
                redirect('order/listNotApprove');
            }
        }
    }

    public function approveAll()
    {
        $result = $this->model->donmuahang->approveAllOrder();
        if ($result == true) {
            $_SESSION['successApproveAll'] = "Phê duyệt tất cả đơn hàng thành công !";
        } else {
            $_SESSION['failApproveAll'] = "Phê duyệt tất cả đơn hàng thất bại !";
        }
        redirect('order/listNotApprove');
    }

    public function assign()
    {
        $idShipper = $_POST['selectShipper'];
        $idOrder = $_POST['idOrder'];
        $result = $this->model->donmuahang->assign($idOrder, $idShipper);
        if ($result == true) {
            $_SESSION['successAssign'] = "Giao việc cho nhân viên giao hàng thành công !";
        } else {
            $_SESSION['failAssign'] = "Giao việc cho nhân viên giao hàng thất bại !";
        }
        redirect('order/index/' . $idOrder);
    }

    public function checkout()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/order/order-checkout');
    }

    public function executeCheckout()
    {
        $idOrder = intval($_POST['maDonHang']);
        $money = intval($_POST['soTien']);
        $order = $this->model->donmuahang->getById('donmuahang', 'idDonHang', $idOrder);
        if (!$order) {
            $_SESSION['errorCheckout'] = "Không tồn tại đơn hàng !";
        } else {
            if (($order['trangThaiDonHang'] === "chưa phê duyệt") || ($order['trangThaiDonHang'] === "đã phê duyệt")) {
                $_SESSION['errorCheckout'] = "Đơn hàng chưa giao, không thể thanh toán !";
            } else
            if (($order['trangThaiDonHang'] === "đã thanh toán")) {
                $_SESSION['errorCheckout'] = "Đơn hàng đã thanh toán rồi !";
            } else {
                // Thuc hien kiem tra thanh toan
                if ($order['tongTien'] > $money) {
                    $_SESSION['errorCheckout'] = "Số tiền nhập vào không đủ thanh toán cho đơn hàng !<br /> Tổng tiền đơn hàng: " . formatPrice($order['tongTien']) . "<br /> Còn thiếu: " . formatPrice($order['tongTien'] - $money);
                } else {
                    // Thuc hien thanh toan
                    $result = $this->model->donmuahang->checkout($idOrder);
                    if ($result == true) {
                        $_SESSION['successCheckout'] = "Thanh toán đơn hàng thành công !<br /> Tổng tiền đơn hàng: " . formatPrice($order['tongTien']) . "<br /> Tiền thừa trả khách : " . formatPrice($money - $order['tongTien']);
                    } else {
                        $_SESSION['errorCheckout'] = "Thanh toán thất bại !";
                    }
                }
            }
        }
        redirect('order/checkout');
    }
}
