<?php

class ClienteController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        
    }

    // /public/cliente/cadastrar/nome/chiquitto/id/100
    public function cadastrarAction() {
        $form = new Application_Form_Cliente();
        $var = $this->getAllParams();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($var)) {
                
            }
        }

        $this->view->form = $form;
    }

}
