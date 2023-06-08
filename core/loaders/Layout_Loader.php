<?php
class Layout_Loader
{
    protected $layout = 'default';

    /**\
     * Dinh kem file layout vao doan ma trong controller
    */
    function load($data = [])
    { 
        extract($data);

        $layout_path = APP_PATH."/views/layout/{$this->layout}.php";
        // Check exist layout file
        if(!file_exists($layout_path)){
            exit("Layout not found: {$layout_path}");
        }

        // Load and show layout on web browser
        require $layout_path;

    }

    function set($layout)
    { 
        $this->layout = $layout;
    }
}
