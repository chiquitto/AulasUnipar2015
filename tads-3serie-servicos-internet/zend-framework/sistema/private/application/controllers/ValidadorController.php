<?php

class ValidadorController
extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        exit;
    }
    
    public function hexAction() {
        $v = new Zend_Validate_Hex();
        
        $string = 'AAP';
        if ($v->isValid($string)) {
            echo "AA eh hexadecimal";
        }
        else {
            echo "$string nao eh hexadecimal";
            
            $erros = $v->getMessages();
            print_r($erros);
        }
        
        exit;
    }
    
    public function emailAction() {
        $v = new Zend_Validate_EmailAddress();
        
        $string = 'chiquitto@gmail.com.unipar';
        if ($v->isValid($string)) {
            echo "$string eh email";
        }
        else {
            echo "$string nao eh email";
            
            $erros = $v->getMessages();
            print_r($erros);
        }
        
        exit;
    }
    
    public function betweenAction() {
        $v = new Zend_Validate_Between(array(
            'min' => 1,
            'max' => 12,
        ));
        
        $valor = 15;
        if ($v->isValid($valor)) {
            echo "$valor eh valido";
        }
        else {
            echo "$valor eh invalido";
            
            $erros = $v->getMessages();
            print_r($erros);
        }
        
        exit;
    }
    
    public function naovazioAction() {
        
    }
}
