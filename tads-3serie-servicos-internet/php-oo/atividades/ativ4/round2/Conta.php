<?php


class Conta {
    private $nome;
    private $numeroConta;
    
    public static  $contas = array();
            
    private function __construct($numero, $nome) {
        $this->numeroConta = $numero;
        $this->nome = $nome;
        
        self::$contas[$numero] = $this;
    }
    
    private static function verificaConta($numero) {
        return isset(self::$contas[$numero]);
    }
    
    public static function novaConta($numero, $nome) {
        if (!self::verificaConta($numero)){
            return new Conta($numero, $nome);
        }
        echo "A conta ja existe!";
        exit();
        
    }
}
