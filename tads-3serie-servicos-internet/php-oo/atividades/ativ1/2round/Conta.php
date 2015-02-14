<?php
 
class Conta {
    protected $saldo = 0;
    
    public function saque($valor) {
        if ($this->saldo < $valor){
            echo 'Saldo insuficiente!';
            exit;
        }
        $this->saldo -= $valor;
    }
    public function deposito($valor) {
        $this->saldo += $valor;
    }
    public function pegarSaldo() {
        return $this->saldo;
    }
        
}

