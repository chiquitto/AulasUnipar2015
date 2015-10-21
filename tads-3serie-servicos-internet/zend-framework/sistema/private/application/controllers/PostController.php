<?php

class PostController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        $conexao = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $conexao->select()
                ->from(array('p' => 'post'))
                ->join(array('c' => 'categoria'), 
                  'p.idcategoria = c.idcategoria');
        $this->view->posts = $sql->query()->fetchAll();
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
    
    public function editarAction(){
                
        $idpost = (int)$this->getRequest()->getParam('idpost', 0);
        $posttb = new Application_Model_DbTable_Post();
        $post = $posttb->fetchRow("idpost = $idpost");
        
        if (!$post){
            echo "idpost invalido";
            exit;
        }
        
        $form = new Application_Form_Post();
        
        if($this->getRequest()->isPost()){
            $valores = $this->getRequest()->getParams();
            
            if ($form->isValid($valores)) {
                $valor = $form->getValues();
                $update = array(
                    'idcategoria' => $valor['idcategoria'], 
                    'titulo' => $valor['titulo'], 
                    'texto' => $valor['texto']
                );
                $posttb->update($update, "idpost = $idpost");
                $this->_helper->redirector->gotoSimpleAndExit('index');
            }
            
        }else{
            $form->populate($post->toArray());
        }
        
        $this->view->form = $form; 
    }
    
    public function apagarAction() {
        $idpost = (int) $this->getRequest()->getParam('idpost');
        $posttb = new Application_Model_DbTable_Post();
        $posttb->delete("idpost = $idpost");
        
        $this->_helper->redirector->gotoSimpleAndExit('index');
    }
}
