<?php
class View_Loader
{
    /**
     * array of views, we want to load on page
     */
    protected $content = [];

    /**
     * Dinh kem file view vao doan ma trong controller 
     */
    function load($view, $data = [])
    {
        extract($data);

        $view_path = APP_PATH . "/views/{$view}.php";

        // Check if exist view file
        if (!file_exists($view_path)) {
            exit("View not found : $view_path");
        }

        // Save view on $content
        ob_start();
        require $view_path;
        $this->content[] = ob_get_contents();
        ob_end_clean();
    }

    /** 
     * show all views
    */
    function show(){
        foreach($this->content as $view){
            echo $view;
        }
    }
}
