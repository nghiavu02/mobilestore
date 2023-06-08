<?php


class Admin_Controller extends Base_Controller
{
    public function index()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            $admin = $this->model->nhanvien->getById('nhanvien', 'idNhanVien', $param[0]);
            $this->layout->set('admin_default');
            $this->view->load('admin/admin/admin-index', [
                'admin' => $admin
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
        $allAdmins = $this->model->nhanvien->getAll('nhanvien', 'chucvu', 'Quản trị viên');
        $this->layout->set('admin_default');
        $this->view->load('admin/admin/admin-list', [
            'admins' => $allAdmins
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