<?php

class Application_Form_Login extends Zend_Form{
    public function init(){
     $login = new Zend_Form_Element_Text('login',array(
         'label'=> 'Login',
         'required'=> true
     ));   
     $senha = new Zend_Form_Element_Password('senha',array(
         'label'=> 'Senha',
         'required'=> true
     ));
     $logar = new Zend_Form_Element_Submit('logar', array(
         'label'=> 'Entrar'
     ));
     
     $this->addElement($login);
     $this->addElement($senha);
     $this->addElement($logar);
    }
}
