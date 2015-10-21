<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			$this->_helper->Redirector->gotoSimpleAndExit('index', 'login');
		}
		
		// Identidade existe, pegue ela
		$identity = $auth->getIdentity();
    }

    public function indexAction()
    {
        
    }


}

