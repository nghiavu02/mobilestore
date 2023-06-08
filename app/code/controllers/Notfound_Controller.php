<?php
class Notfound_Controller extends Base_Controller
{
    public function index()
    {
        $this->view->load('frontend/notfound/index');
    }
}
