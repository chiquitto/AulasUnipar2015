<?php

class LoginController extends Zend_Controller_Action {
	public function init() {}
	
	// http://localhost/.../public/login
	public function indexAction() {
		$form = new Application_Form_Usuario_Login();
		
		if( $this->getRequest()->isPost() ) {
			if( $form->isValid($this->_getAllParams()) ) {
				
				$tabelaUsuario = new Application_Model_Table_Usuario();
				
				$authAdaptador = new Zend_Auth_Adapter_DbTable( $tabelaUsuario->getDefaultAdapter() );
				
				$valores = $form->getValues();
				
				$authAdaptador
					->setTableName('usuario')
					->setIdentityColumn('email')
					->setCredentialColumn('senha')
					->setIdentity($valores['email'])
					->setCredential($valores['senha'])
				;
				
				$auth = Zend_Auth::getInstance();
				$autenticado = $auth->authenticate($authAdaptador);
				
				if( $autenticado->isValid() ) {
					
					// pega as informacoes da pesquisa ao bd
					$inf = $authAdaptador->getResultRowObject(null, array('senha'));
					$auth->getStorage()->write($inf);
					
					/*print_r($_SESSION);
					exit;*/
					
					$this->_helper->Redirector
					->gotoSimpleAndExit('index', 'index');
					
				}
				else {
					echo 'Informacoes incorretas';
					exit;
				}
				
			}
		}
		
		$this->view->form = $form;
	}
}