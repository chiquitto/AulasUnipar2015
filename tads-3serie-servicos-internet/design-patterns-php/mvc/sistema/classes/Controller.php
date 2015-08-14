<?php

abstract class Controller {
    
    private $view;

    protected function getView() {
        if ($this->view === null) {
            $this->view = new View();
        }
        
        return $this->view;
    }

}
