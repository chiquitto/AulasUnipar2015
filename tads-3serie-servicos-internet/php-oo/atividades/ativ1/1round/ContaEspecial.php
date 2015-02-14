<?php

class ContaEspecial
extends Conta {
    private $limite = 0;
    private $juros = 10;
    
    public function definirLimite($limite) {
        $this->limite = $limite;
    }
    
    public function pegarLimite() {
        return $this->limite;
    }
    
    public function definirJuros($juros) {
        $this->juros = $juros;
    }
    
    public function pegarJuros() {
        return $this->juros;
    }
    
    public function saque($valor) {
        $podeSacar = $this->saldo + $this->limite;
        
        if ($valor > $podeSacar) {
            echo 'Saldo com limite insuficiente';
            exit;
        }
        
        $this->saldo -= $valor;
    }
    
    public function virarMes() {
        if ($this->saldo < 0) {
            $juros = $this->juros / 100 * $this->saldo;
            $this->saldo += $juros;
        }
    }
}

