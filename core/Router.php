<?php
class Router
{
    /* $area = 0 is frontend, $area = 1 is admin*/
    protected $area = 0;
    protected $module;
    protected $action;
    protected $param = [];
    public function __construct()
    {
        $arr = $this->urlProcess();
        $config = require BASE_PATH . '/config/config.php';
        $this->module = $config['default_module'];
        $this->action = $config['default_action'];
        if (!empty($arr)) {
            if ($arr[0] === "admin") {
                $this->area = 1;
                if (isset($arr[1]) && $arr[1] != '') {
                    $this->module = $arr[1];
                    if (isset($arr[2]) && $arr[2] != '') {
                        $this->action = $arr[2];
                        array_shift($arr);
                        array_shift($arr);
                        array_shift($arr);
                        $this->param = $arr;
                    }
                }
            } else {
                if (isset($arr[0]) && $arr[0] != '') {
                    $this->module = $arr[0];
                    if (isset($arr[1]) && $arr[1] != '') {
                        $this->action = $arr[1];
                        array_shift($arr);
                        array_shift($arr);
                        $this->param = $arr;
                    }
                }
            }
        }
        
    }

    function urlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'])));
        }
    }

    function load_app()
    {
        // load base and core controller
        require BASE_PATH . "/core/Core_Controller.php";
        require BASE_PATH . "/core/Base_Controller.php";

        // load model
        require BASE_PATH . "/core/Core_Model.php";
        require BASE_PATH . "/core/Base_Model.php";

        $controller = ucfirst($this->module) . '_Controller';
        if ($this->area === 1) {
            $controller_path = APP_PATH . "/controllers/admin/{$controller}.php";
        } else {
            $controller_path = APP_PATH . "/controllers/{$controller}.php";
        }

        // Check exist File
        if (!file_exists($controller_path)) {
            // echo ("File not found : " . $controller_path);
            if ($this->area === 1) {
                header('location:' . BASE_URL . 'admin/notfound/index');
                exit();
            } else {
                header('location:' . BASE_URL . 'notfound/index');
                exit();
            }
        }
        require $controller_path;

        // Check exist Class
        if (!class_exists($controller)) {
            // echo ("Class not found : " . $controller);
            if ($this->area === 1) {
                header('location:' . BASE_URL . 'admin/notfound/index');
                exit();
            } else {
                header('location:' . BASE_URL . 'notfound/index');
                exit();
            }
        }

        $object = new $controller;

        // Check exist action
        $myAction = $this->action;
        if (!method_exists($object, $myAction)) {
            // echo ("Action not found : " . $myAction . "() in " . $controller);
            if ($this->area === 1) {
                header('location:' . BASE_URL . 'admin/notfound/index');
                exit();
            } else {
                header('location:' . BASE_URL . 'notfound/index');
                exit();
            }
        }

        $object->$myAction();
    }

    function getArea()
    {
        return $this->area;
    }

    function getModule()
    {
        return $this->module;
    }

    function getAction()
    {
        return $this->action;
    }

    function getParam()
    {
        return $this->param;
    }
}
