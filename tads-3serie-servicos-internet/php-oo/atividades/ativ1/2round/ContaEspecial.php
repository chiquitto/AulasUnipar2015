<?php

class ContaEspecial extends Conta {
    private $limite = 100;
    private $juros = 10;
    
    public function calculaJuros() {
        
        if ($this->saldo < 0){
            $totalJuros = $this->juros / 100 * $this->saldo;
            $this->saldo += $totalJuros;
        }
    }
    
    public function saque($valor) {
        $valorLimite = $this->saldo + $this->limite;  
        if ($valor > $valorLimite){
            echo 'Saldo e limite insuficientes!';
            exit;
        }
        $this->saldo -= $valor;
        
    }
}

