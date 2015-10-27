<?php

class LoginController extends Zend_Controller_Action {

    public function init() {
        
    }

    // http://localhost/.../public/login
    public function indexAction() {
        $form = new Application_Form_Login();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getParams())) {
                $authDB = new Zend_Auth_Adapter_DbTable(
                Zend_Db_Table_Abstract::getDefaultAdapter()
                        );
                $authDB->setTableName('usuario');
                $authDB->setIdentityColumn('login');
                $authDB->setCredentialColumn('senha');
                $authDB->setIdentity($form->getValue('login'));
                $authDB->setCredential($form->getValue('senha'));
                
                $auth = Zend_Auth::getInstance();
                $autenticar = $auth->authenticate($authDB);
                
                if ($autenticar->isValid()){
                    $autenticacao = $authDB->getResultRowObject(null, array('senha'));
                    $auth->getStorage()->write($autenticacao);
                    
                    $this->_helper->redirector->gotoSimpleAndExit('index', 'index');
                    exit;
                }else
                {
                    echo 'Login ou senha incorretos';
                    exit;
                }
                   
                
            }
        }

        $this->view->form = $form;
    }

}
