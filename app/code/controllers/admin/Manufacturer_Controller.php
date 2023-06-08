<?php


class Manufacturer_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allNhaSX = $this->model->nhasanxuat->getNhaSX();
        $this->layout->set('admin_default');
        $this->view->load('admin/manufacturer/manufacturer-list', [
            'nhaSX'=>$allNhaSX
        ]);
    }
    
    public function add()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/manufacturer/manufacturer-add');
    }

    public function edit()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $manufacturer = $this->model->nhasanxuat->getById('nhasanxuat', 'idNhaSanXuat', $param[0]);
                $this->layout->set('admin_default');
                $this->view->load('admin/manufacturer/manufacturer-edit', [
                    'manufacturer' => $manufacturer
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
        $result = $this->model->nhasanxuat->saveEditManufacturer();
        if ($result == true) {
            $_SESSION['saveManufacturerSuccess'] = "Cập nhật thông tin nhà sản xuất thành công !";
        } else {
            pretty($result);
            $_SESSION['saveManufacturerFail'] = "Bạn chưa thay đổi thông tin gì !";
        }
        redirect('manufacturer/list');
    }

    public function save()
    {
        $post = $_POST ?? null;
        $nhaSXName = $post['ten'];
        $folderNhaSX = preg_replace('/\s+/', '', $nhaSXName);
        // Update database
        $result = $this->model->nhasanxuat->saveNewNhaSX();
        if ($result == true) {
            $_SESSION['addNewManufacturerSuccess'] = "Thêm nhà sản xuất mới thành công !";
        } else {
            $_SESSION['addNewManufacturerFail'] = "Thêm nhà sản xuất mới thất bại !";
        }
        redirect('manufacturer/list');
    }

    public function searchName()
    {
        $result = null;
        $nameNhaSX = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $nameNhaSX = $param[0];
            $result = $this->model->nhasanxuat->searchNhaSX($nameNhaSX);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchNhaSXByName', [
            'result' => $result
        ]);
    }

    public function deleteManufacturer()
    {

        $count = $this->model->nhasanxuat->getCount();
        if($count < 8){
            $_SESSION['deleteManufacturerFails'] = "Số lượng dưới 8 nhà sản xuất, bạn không thể xóa!";
        }else{
            $param = getParameter();
            if (!empty($param[0])) {
                if(intval($param[0]) != 0){
                    $idNhaSanXuat = $param[0];
                    // Get url file from database
                    $nhasanxuat = $this->model->nhasanxuat->getById('nhasanxuat', 'idNhaSanXuat', $idNhaSanXuat);
                    $mobile = $this->model->mobile->getById('mobile', 'NhaSanXuat_idNhaSanXuat', intval($param[0]));
                    if($mobile == null){
                        // Delete file from database
                        $result = $this->model->nhasanxuat->deleteManufacturer($idNhaSanXuat);
                        if ($result == true) {
                            $_SESSION['deleteManufacturerSuccess'] = "Xóa nhà sản xuất thành công !";
                        }
                    }else{
                        $_SESSION['deleteManufacturerFail'] = "Còn sản phẩm, không thể xóa nhà sản xuất !";
                    }
                }
            }
        }
        redirect('manufacturer/list');
    }
}