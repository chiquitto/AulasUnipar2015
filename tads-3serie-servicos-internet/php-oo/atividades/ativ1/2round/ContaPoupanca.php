<?php

class ContaPoupanca extends Conta {
    private $rendimento = 0.5;
    
    public function calculaRendimento() {
        $valorRendimento = $this->saldo / 100 * $this->rendimento;
        $this->saldo += $valorRendimento;
    }
}
