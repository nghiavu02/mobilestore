<?php
class Mobile_Controller extends Base_Controller
{
    public function index()
    {
        $mobile = $this->model->mobile->getAll();
        $this->view->load('frontend/mobile/index', [
            'mobile' => $mobile
        ]);
    }
    
}
