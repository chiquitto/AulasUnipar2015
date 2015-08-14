<?php

class Circulo implements AreaCalculavel {
    
    const PI = 3.1415;
    private $raio = 0;
    
    public function calculaArea() {
        return ($this->raio * $this->raio)
            * self::PI;
    }
    
    public function definirRaio($raio) {
        $this->raio = $raio;
    }
    
}
