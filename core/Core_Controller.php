<?php
class Core_Controller
{
    protected $layout;
    protected $view;
    protected $model;
    protected $helper;

    function __construct()
    {
        // load layout loader
        require BASE_PATH . "/core/loaders/Layout_Loader.php";
        $this->layout = new Layout_Loader;

        // load view loader
        require BASE_PATH . "/core/loaders/View_Loader.php";
        $this->view = new View_Loader;

        // load model loader
        require BASE_PATH . "/core/loaders/Model_Loader.php";
        $this->model = new Model_Loader;

        // load helper loader
        require BASE_PATH . "/core/loaders/Helper_Loader.php";
        $this->helper = new Helper_Loader;

        // auto load all model, helper ...
        $this->autoload();
    }

    function autoload()
    {
        $autoload_config = require BASE_PATH . '/config/autoload.php';

        foreach ($autoload_config as $config_key => $config_values) {

            foreach ($config_values as $autoload) {
                $this->$config_key->load($autoload);
            }
        }
    }
}
