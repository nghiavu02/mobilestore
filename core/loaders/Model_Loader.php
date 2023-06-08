<?php
    class Model_Loader{
        /**
         * Load a model table 
         * @param model_name is name of table
         */
        function load($model_name){
            $model = ucfirst($model_name)."_Model";
            $model_path = APP_PATH."/models/{$model}.php";
            // Check exist model file
            if(!file_exists($model_path)){
                exit("Model file not found : {$model_path}");
            }
            require $model_path;
            $this->$model_name = new $model; 
        }
    }