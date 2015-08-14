<?php

class Conta {
    protected $saldo = 0;
    private $numero;
    private $cliente;
    
    public function saque($valor) {
        if ($valor > $this->saldo) {
            echo 'Saldo insuficiente';
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
    
    public function definirNumero($numero) {
        $this->numero = $numero;
    }
    
    public function pegarNumero() {
        return $this->numero;
    }
    
    public function definirCliente($cliente) {
        $this->cliente = $cliente;
    }
    
    public function pegarCliente() {
        return $this->cliente;
    }
}









