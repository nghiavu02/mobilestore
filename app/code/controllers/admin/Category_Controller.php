<?php


class Category_Controller extends Base_Controller
{
    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $allCategory = $this->model->theloai->getCategory();
        $this->layout->set('admin_default');
        $this->view->load('admin/category/category-list', [
            'categorys' => $allCategory
        ]);
    }

    public function add()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/category/category-add');
    }

    public function edit()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $category = $this->model->theloai->getById('theloai', 'idTheloai', $param[0]);
                $this->layout->set('admin_default');
                $this->view->load('admin/category/category-edit', [
                    'category' => $category
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
        $result = $this->model->theloai->saveEditCategory();
        if ($result == true) {
            $_SESSION['saveCategorySuccess'] = "Cập nhật thông tin thể loại thành công !";
        } else {
            pretty($result);
            $_SESSION['saveCategoryFail'] = "Bạn chưa thay đổi thông tin gì !";
        }
        redirect('category/list');
    }

    public function save()
    {
        $post = $_POST ?? null;
        $categoryName = $post['ten'];
        $folderCategory = preg_replace('/\s+/', '', $categoryName);
        // Update database
        $result = $this->model->theloai->saveNewCategory();
        if ($result == true) {
            $_SESSION['addNewCategorySuccess'] = "Thêm thể loại mới thành công !";
        } else {
            $_SESSION['addNewCategoryFail'] = "Thêm thể loại mới thất bại !";
        }
        redirect('category/list');
    }

    public function searchName()
    {
        $result = null;
        $nameCategory = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $nameCategory = $param[0];
            $result = $this->model->theloai->searchCategory($nameCategory);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchCategoryByName', [
            'result' => $result
        ]);
    }

    public function deleteCategory()
    {
        $count = $this->model->theloai->getCount();
        if($count < 8){
            $_SESSION['deleteCategoryFails'] = "Số lượng dưới 8 thể loại, bạn không thể xóa!";
        }else{
            $param = getParameter();
            if (!empty($param[0])) {
                if(intval($param[0]) != 0){
                    $idTheloai = $param[0];
                    // Get url file from database
                    $theloai = $this->model->theloai->getById('theloai', 'idTheloai', $idTheloai);
                    $mobile = $this->model->mobile->getById('mobile', 'theloai_idTheloai', intval($param[0]));
                    if($mobile == null){
                        // Delete file from database
                        $result = $this->model->theloai->deleteCategory($idTheloai);
                        if ($result == true) {
                            $_SESSION['deleteCategorySuccess'] = "Xóa thể loại thành công !";
                        }
                    }else{
                        $_SESSION['deleteCategoryFail'] = "Còn sản phẩm, không thể xóa thể loại !";
                    }
                }
            }
        }
        
        redirect('category/list');
    }
}