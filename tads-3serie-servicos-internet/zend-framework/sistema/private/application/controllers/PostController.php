<?php

class PostController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        
       $postTB = new Application_Model_DbTable_Post();
       
       $post = $postTB->fetchAll(null, 'idpost desc');
       
       $this->view->posts = $post;
        
    }

    // /public/post/cadastrar
    public function cadastrarAction() {
        $form = new Application_Form_Post();
        $var = $this->getAllParams();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($var)) {
                $dados = $form->getValues();
                
                $inserir = array(
                    'idcategoria' => $dados['idcategoria'],
                    'titulo' => $dados['titulo'],
                    'texto' => $dados['texto']
                );
                
                $tb = new Application_Model_DbTable_Post();
                $tb->insert($inserir);
                
                $this->_helper->redirector->gotoSimpleAndExit('index');
            }
        }

        $this->view->form = $form;
    }

}
