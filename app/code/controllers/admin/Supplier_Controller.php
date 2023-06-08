<?php


class Supplier_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allSupplier = $this->model->nhacungcap->getSupplier();
        $this->layout->set('admin_default');
        $this->view->load('admin/supplier/supplier-list',[
            'supplier'=>$allSupplier
        ]);
    }
    public function add()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/supplier/supplier-add');
    }

    public function edit()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $supplier = $this->model->nhacungcap->getById('nhacungcap', 'idNhaCungCap', $param[0]);
                $this->layout->set('admin_default');
                $this->view->load('admin/supplier/supplier-edit', [
                    'supplier' => $supplier
                ]);
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
    }

    public function saveEdit()
    {
        $result = $this->model->nhacungcap->saveEditSupplier();
        if ($result == true) {
            $_SESSION['saveSupplierSuccess'] = "Cập nhật thông tin nhà cung cấp thành công !";
        } else {
            pretty($result);
            $_SESSION['saveSupplierFail'] = "Bạn chưa thay đổi thông tin gì !";
        }
        redirect('supplier/list');
    }

    public function save()
    {
        $post = $_POST ?? null;
        $supplierName = $post['ten'];
        $folderSupplier = preg_replace('/\s+/', '', $supplierName);
        // Update database
        $result = $this->model->nhacungcap->saveNewSupplier();
        if ($result == true) {
            $_SESSION['addNewSupplierSuccess'] = "Thêm nhà cung cấp mới thành công !";
        } else {
            $_SESSION['addNewSupplierFail'] = "Thêm nhà cung cấp mới thất bại !";
        }
        redirect('supplier/list');
    }

    public function searchName()
    {
        $result = null;
        $nameSupplier = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $nameSupplier = $param[0];
            $result = $this->model->nhacungcap->searchSupplier($nameSupplier);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchSupplierByName', [
            'result' => $result
        ]);
    }
    public function deleteSupplier()
    { 
        $count = $this->model->nhacungcap->getCount();
        if($count < 8){
            $_SESSION['deleteSupplierFails'] = "Số lượng dưới 8 nhà cung cấp, bạn không thể xóa!";
        }else{
            $param = getParameter();
            if (!empty($param[0])) {
                if(intval($param[0]) != 0){
                    $idNhaCungCap = $param[0];
                    // Get url file from database
                    $nhacungcap = $this->model->nhacungcap->getById('nhacungcap', 'idNhaCungCap', $idNhaCungCap);
                    $mobile = $this->model->mobile->getById('mobile', 'NhaCungCap_idNhaCungCap', intval($param[0]));
                    if($mobile == null){
                        // Delete file from database
                        $result = $this->model->nhacungcap->deleteSupplier($idNhaCungCap);
                        if ($result == true) {
                            $_SESSION['deleteSupplierSuccess'] = "Xóa nhà cung cấp thành công !";
                        }
                    }else{
                        $_SESSION['deleteSupplierFail'] = "Còn sản phẩm, không thể xóa nhà cung cấp !";
                    }
                }
            }
        }
        redirect('supplier/list');
    }
}