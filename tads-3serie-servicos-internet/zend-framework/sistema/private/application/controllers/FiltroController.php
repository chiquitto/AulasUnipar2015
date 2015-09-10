<?php

class FiltroController extends Zend_Controller_Action{
    public function init() {
        
    }
    
    public function indexAction(){
        
        exit;
    }
    
    public function upperAction(){
        $v = new Zend_Filter_StringToUpper();
        
        $texto = 'hoje eh quarta-feira';
        echo $v->filter($texto);
        exit;
    }
    
    public function numerosAction(){
        $v = new Zend_Filter_Digits();
        
        $numero = '123oi321';
        echo $v->filter($numero);
        exit;
    }
    
    public function compactarAction(){
        $v = new Zend_Filter_Compress(array(
            'adapter' => 'Zip',
            'options' => array(
                'archive' => 'D:\arquivo.zip',
            ),
        ));
        
        $compactar = $v->filter('D:\css.zip');
        var_dump($compactar);
        exit;
    }
    
    public function descompactarAction(){
        $v = new Zend_Filter_Decompress(array(
           'adapter' => 'Zip',
            'options' => array(
                'target' => 'D:\aula',
            ),
        ));
        
        $descompactar = $v->filter('D:\arquivo.zip');
        var_dump($descompactar);
        exit;
    }
    
    public function somenteletraAction(){
        $v = new Zend_Filter_Alpha(array(
                'allowwhitespace' => true
            ));
        
        $texto = 'Thais,*123* Renan *456* @ Mayara';
        
        echo $v->filter($texto);
        exit;
    }
    
    public function callbackAction(){
        $v = new Zend_Filter_Callback('Arara');
        
        $texto = 'subino on ibus marrocos';
        
        echo $v->filter($texto);
        exit;
    }
}

function Arara($string){
    $string = strtoupper($string);
    $string = strrev($string);
    return $string;
}


//