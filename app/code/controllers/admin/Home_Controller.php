<?php

class Home_Controller extends Base_Controller
{
    function index()
    {
        $isSignedIn = isset($_SESSION['isSignedIn']) ? true : false;
        if (!$isSignedIn) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/home/index');
    }
}
