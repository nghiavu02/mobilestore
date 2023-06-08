<?php


class Stocker_Controller extends Base_Controller
{
    public function index()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            $stocker = $this->model->nhanvien->getById('nhanvien', 'idNhanVien', $param[0]);
            $this->layout->set('admin_default');
            $this->view->load('admin/stocker/stocker-index', [
                'stocker' => $stocker
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
        $allStockers = $this->model->nhanvien->getAll('nhanvien', 'chucvu', 'Nhân viên thủ kho');
        $this->layout->set('admin_default');
        $this->view->load('admin/stocker/stocker-list', [
            'stockers' => $allStockers
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