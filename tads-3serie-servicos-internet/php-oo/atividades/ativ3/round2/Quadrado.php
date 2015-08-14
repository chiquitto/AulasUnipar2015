<?php

class Quadrado implements AreaCalculavel{
    private $lado=0;
    
    public function calculaArea() {
        return $this->lado * $this->lado;
    }
    
    public function definirLado($lado){
        $this->lado = $lado;
    }
    
}
