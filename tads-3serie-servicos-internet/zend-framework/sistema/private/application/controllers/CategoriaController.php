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
    
    public function editarAction() {
        $idcategoria = (int) $this->getRequest()->getParam('idcategoria', 0);
        $categoriatb = new Application_Model_DbTable_Categoria();
        $categoria = $categoriatb->fetchRow("idcategoria = $idcategoria");
        
        if(!$idcategoria) {
            echo 'ID da Categoria nao eh valido';
            exit();
        }
        
        $form = new Application_Form_Categoria();
        
        if($this->getRequest()->isPost()) {
            $valores = $this->getRequest()->getParams();
            
            if ($form->isValid($valores)) {
                $valor = $form->getValues();
                $update = array(
                    'categoria' => $valores['categoria']
                );
                $categoriatb->update($valor, "idcategoria = $idcategoria");
                $this->_helper->redirector->gotoSimpleAndExit("index");
            }
            
        } else {
            $form->populate($categoria->toArray());
        }
        
        $this->view->form = $form;
    }
    
    public function excluirAction() {
        $idcategoria = (int) $this->getRequest()->getParam('idcategoria', 0);
        $categoriatb = new Application_Model_DbTable_Categoria();
        
        $posttb = new Application_Model_DbTable_Post();
        $post = $posttb->fetchRow("idcategoria = $idcategoria");
        
        if (!$post) {
            $categoriatb->delete("idcategoria = $idcategoria");
        } else {
            echo 'Existe Post(s) com essa Categoria';
            exit();
        }
        
        $this->view->form = $form;
    }

}
