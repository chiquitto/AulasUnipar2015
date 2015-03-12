<?php

class View {
    private $valores = array();
    
    public function getValor ($nome) {
        if (isset($this->valores[$nome])) {
            return $this->valores[$nome];
        }
        return null;
    }
    
    public function setValor ($nome, $valor) {
        $this->valores[$nome] = $valor;
    }
    
    public function mostrar ($tela) {
        include TELAS . '/' . $tela . '.phtml';
    }
}