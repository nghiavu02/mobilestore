<?php 
    class Helper_Loader{
        function load($helper_name){
            $helper = ucfirst($helper_name).'_Helper';
            $helper_path = BASE_PATH."/core/helpers/{$helper}.php";
            if(!file_exists($helper_path)){
                exit("Helper file not found : {$helper_path}");
            }
            require $helper_path;
        }
    }
