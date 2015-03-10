<?php

class View {
    private $valores = array();
    
    public function getValor ($nome) {
        return $this->valores[$nome];
    }
    
    public function setValor ($nome, $valor) {
        $this->valores[$nome] = $valor;
    }
    
    public function mostrar ($tela) {
        include TELAS . '/' . $tela . '.phtml';
    }
}