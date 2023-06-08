<?php


class Seller_Controller extends Base_Controller
{

    public function index()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            $seller = $this->model->nhanvien->getById('nhanvien', 'idNhanVien', $param[0]);
            $this->layout->set('admin_default');
            $this->view->load('admin/seller/seller-index', [
                'seller' => $seller
            ]);
        } else {
            redirect('notfound/index');
        }
    }

    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allSellers = $this->model->nhanvien->getAll('nhanvien', 'chucvu', 'Nhân viên bán hàng');
        $this->layout->set('admin_default');
        $this->view->load('admin/seller/seller-list', [
            'sellers' => $allSellers
        ]);
    }

    public function edit()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            $employee = $this->model->nhanvien->getById('nhanvien', 'idNhanVien', $param[0]);
            $this->layout->set('admin_default');
            $this->view->load('admin/user/user-edit', [
                'employee' => $employee
            ]);
        } else {
            redirect('notfound/index');
        }
    }
}