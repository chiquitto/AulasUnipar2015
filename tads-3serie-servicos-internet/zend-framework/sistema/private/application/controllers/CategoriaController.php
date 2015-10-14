<?php

class CategoriaController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        $categoria = new Application_Model_DbTable_Categoria();
        
        $categorias = $categoria->fetchAll();
        
        $this->view->categorias = $categorias;
    }

    // /public/categoria/cadastrar
    public function cadastrarAction() {
        $form = new Application_Form_Categoria();
        $var = $this->getAllParams();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($var)) {
                $dados = $form->getValues();
                
                $inserir = array(
                    'categoria' => $dados['categoria']
                );
                
                $tb = new Application_Model_DbTable_Categoria();
                $tb->insert($inserir);
                
                $this->_helper->redirector->gotoSimpleAndExit('index');
            }
        }

        $this->view->form = $form;
    }

}
