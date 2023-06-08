<?php
class Base_Controller extends Core_Controller{

    /**
     * Render all views inside layout
    */
    function renderLayout(){
        ob_start();
        $this->view->show();
        $content = ob_get_contents();
        ob_end_clean();

        $this->layout->load(
            [
                'content' => $content
            ]
        );
    }


    /**
     * Run before all common controllers to render layout and view inside it.
    */
    function __destruct()
    {
        $this->renderLayout();
    }
}