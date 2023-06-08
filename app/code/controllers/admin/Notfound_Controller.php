<?php
class Notfound_Controller extends Base_Controller
{ 
    public function index()
    {
        $this->layout->set('admin_default');
        $this->view->load('admin/notfound/index');
    }
}
