<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
      $auth = Zend_Auth::getInstance();
      if (!$auth->hasIdentity()){
          $this->_helper->redirector->gotoSimpleAndExit('index', 'login');    
      }
    }	

    public function indexAction()
    {
        $auth = Zend_Auth::getInstance();
        $usuario = $auth->getIdentity();
        
        $this->view->nomeusuario = $usuario->nome;
    }


}

