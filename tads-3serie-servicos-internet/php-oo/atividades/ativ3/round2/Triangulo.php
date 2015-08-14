<?php

class Triangulo implements AreaCalculavel{
    
    private $altura=0;
    private $largura=0;
    
    public function calculaArea(){
        return ($this->altura * $this->largura)/2;
    }
    
    public function definirAltura($altura){
        $this->altura = $altura;
    }
    public function definirLargura($largura){
        $this->largura = $largura;
    }
}

