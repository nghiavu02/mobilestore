<?php


class Banner_Controller extends Base_Controller
{

    public function list()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $banners = $this->model->banner->getAll('banner', null, null);
        $this->layout->set('admin_default');
        $this->view->load('admin/banner/banner-list', [
            'banners' => $banners
        ]);
    }

    public function updateVisibleBanner()
    {
        $result = $this->model->banner->updateVisibleBanner();
        if ($result) {
            $_SESSION['updateVisibleBannerSuccess'] = "Cập nhật các banner hiển thị trên homepage thành công !";
        } else {

        }
        redirect('banner/list');
    }

    // Chuyen toi trang them moi banner
    public function createNew()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/banner/banner-createNew');
    }

    // Luu banner moi vao co so du lieu
    public function saveNew()
    {
        // Upload file to banner folder
        $uploaddir = '/mobileshop/static/image/banner/';
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . $uploaddir . basename($_FILES['banner']['name']);
        $imageSize = getimagesize($_FILES['banner']['tmp_name']);
        if (($imageSize[0] == 800) && ($imageSize[1] == 300)) {
            if (file_exists($uploadfile)) {
                $_SESSION['existedFile'] = "Banner này đã tồn tại !";
            } else {
                $_SESSION['name_image'] = $_FILES['banner']['name'];
                $_SESSION['url_image'] = 'static/image/banner/' . $_FILES['banner']['name'];
                if (move_uploaded_file($_FILES['banner']['tmp_name'], $uploadfile)) {
                    // Neu upload file thanh cong, luu file vao co so du lieu
                    $result = $this->model->banner->saveNewBanner();
                    if ($result == true) {
                        $_SESSION['uploadBannerSuccess'] = "Thêm banner mới thành công !";
                    }
                }
            }
        } else {
            $_SESSION['invalidSize'] = "Ảnh của bạn không đúng kích thước !";
        }
        redirect('banner/createNew');
    }

    public function deleteBanner()
    {
        $param = getParameter();
        if (!empty($param[0])) {
            $idBanner = $param[0];
            // Get url file from database
            $banner = $this->model->banner->getById('banner', 'idBanner', $idBanner);
            // Delete file from disk
            $linkFile = $_SERVER['DOCUMENT_ROOT'] . "/mobileshop/" . $banner['url'];
            unlink($linkFile);
            // Delete file from database
            $result = $this->model->banner->deleteBanner($idBanner);
            if ($result == true) {
                $_SESSION['deleteBannerSuccess'] = "Xóa banner thành công !";
            }
        }
    }
}