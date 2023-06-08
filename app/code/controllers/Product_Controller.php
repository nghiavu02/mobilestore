<?php

class Product_Controller extends Base_Controller
{
    function index()
    {
        // Get idMobile on URL that user want to view detail
        $param = getParameter();
        if (isset($param[0])) {
            if (is_numeric($param[0])) {
                $mobile = $this->model->mobile->getById('mobile', 'idMobile', $param[0]);
                if ($mobile == null) {
                    redirect('notfound/index');
                } else {
                    // Link mobile and it's images ( base image and other images)
                    linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($param[0]), $this->model->hinhanh->getOtherImage($param[0]));
                    // get all other images
                    $images = $this->model->hinhanh->getOtherImage($param[0]);
                }
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
        // Send data mobile to view and load view
        $this->view->load('frontend/product/index', [
            'mobile' => $mobile,
            'images' => $images
        ]);
    }

    public function search()
    {
        $key = isset($_POST['search']) ? $_POST['search'] : null;
        if ($key == null) {
            redirect('');
        } else {
            // Tìm kiếm tên sản phẩm theo key là tên sản phẩm hoặc tên
            $arrayProducts = $this->model->mobile->search($key);
            // Link mobile and it's images ( base image and other images)
            foreach ($arrayProducts as &$mobile) {
                linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
            }
            $this->view->load('frontend/product/searchResult', [
                'key' => $key,
                'arrayProducts' => $arrayProducts
            ]);
        }
    }

    public function productByManufacturer()
    {
        $param = getParameter();
        if (!empty($param[0])) {
            if (intval($param[0]) != 0) {
                $manufacturer = $this->model->nhasanxuat->getById('nhasanxuat', 'idNhaSanXuat', $param[0]);
                if ($manufacturer['idNhaSanXuat'] == null) {
                    redirect('');
                } else {
                    $arrayProducts = $this->model->mobile->searchByManufacturer($manufacturer['idNhaSanXuat']);
                    foreach ($arrayProducts as &$mobile) {
                        linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
                    }
                    $this->view->load('frontend/product/productByManufacturer', [
                        'manufacturerName' => $manufacturer['tenNhaSX'],
                        'manufacturer' => $manufacturer['idNhaSanXuat'],
                        'arrayProducts' => $arrayProducts
                    ]);
                }
            } else {
                redirect('notfound/index');
            }
        } else {
            redirect('notfound/index');
        }
    }

    public function productByNew()
    {
        $arrayProducts = $this->model->mobile->searchByProductNew();
        foreach ($arrayProducts as &$mobile) {
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
        }
        $this->view->load('frontend/product/productByNew', [
            'arrayProducts' => $arrayProducts
        ]);
    }

    public function productByMoney()
    {
        $param = getParameter();
        if ($param == null) {
            redirect('');
        } else {
            $arrayProducts = $this->model->mobile->searchByMoney($param[0], $param[1]);
            foreach ($arrayProducts as &$mobile) {
                linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
            }
            $this->view->load('frontend/product/productByMoney', [
                'key' => $param[0],
                'key1' => $param[1],
                'arrayProducts' => $arrayProducts
            ]);
        }
    }

    public function list()
    {
        $arrayProducts = $this->model->mobile->getAll('mobile', null, null);
        // Link mobile and it's images ( base image and other images)
        foreach ($arrayProducts as &$mobile) {
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
        }
        $this->view->load('frontend/product/grid', [
            'arrayProducts' => $arrayProducts
        ]);
    }
}
