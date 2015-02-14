<?php

class ContaPoupanca
extends Conta {
    private $rendimento = 0.5;
    
    public function definirRendimento($rendimento) {
        $this->rendimento = $rendimento;
    }
    
    public function pegarRendimento() {
        return $this->rendimento;
    }
    
    public function virarMes() {
        $rendimento = ($this->rendimento / 100) * $this->saldo;
        
        $this->saldo += $rendimento;
    }
}