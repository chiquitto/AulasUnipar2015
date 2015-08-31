<?php

class ClienteController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        
    }

    // /public/cliente/cadastrar/nome/chiquitto/id/100
    public function cadastrarAction() {
        $this->view->url = '/cliente/cadastrar';
        
        // $_GET
        // $_POST
        
        $id = $this->getParam('id', 0);
        $nome = $this->getParam('nome');
        
        $this->view->id = $id;
        $this->view->nome = $nome;
    }

}
