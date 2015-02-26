<?php

class Conta {
    private $nome;
    private $conta;
    
    public static $contas = array();
    
    private function __construct($conta, $nome) {
        $this->conta = $conta;
        $this->nome = $nome;
        
        Conta::$contas[] = $conta;
    }
    
    private static function verificaContas($numeroConta) {
        return in_array($numeroConta, Conta::$contas);
    }
    
    public static function novaConta($numero, $nome) {
        if (!self::verificaContas($numero)) {
            return new Conta($numero, $nome);
        }
        
        echo 'Conta já existe';
        exit;
    }
}