<?php
class Home_Controller extends Base_Controller
{
    function index()
    {
        // Get data banners
        $banners = $this->model->banner->getActiveBanners();

        // Get data mobile gia soc
        $mobileGiaSocs = $this->model->mobile->getMobileGiaSoc();
        // Link mobile and it's images ( base image and other images)
        foreach($mobileGiaSocs as &$mobile){
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
        }

        // Get data mobile new ( nhung duoc hien thi o HomePage : visibleOnHome = 1)
        $mobileNews = $this->model->mobile->getMobileNew();
        // Link mobile and it's images ( base image and other images)
        foreach($mobileNews as &$mobile){
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
        }

        // Get data mobile noi bat
        $mobileNoiBats = $this->model->mobile->getMobileNoiBat();
        // Link mobile and it's images ( base image and other images)
        foreach($mobileNoiBats as &$mobile){
            linkImageAndMobile($mobile, $this->model->hinhanh->getBaseImage($mobile['idMobile']), $this->model->hinhanh->getOtherImage($mobile['idMobile']));
        }

        // Load home view
        $this->view->load('frontend/home/index', [
            'banners' => $banners,
            'mobileGiaSocs' => $mobileGiaSocs,
            'mobileNews' => $mobileNews,
            'mobileNoiBats' => $mobileNoiBats
        ]);
    }

    function show()
    { }
}
