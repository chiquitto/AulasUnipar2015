<?php

class Conexao {
    private static $instancia;
    
    private function __construct() {
        echo "Abrir conexao <br>";
    }
    
    public function __clone() {
        echo "Conexao nao pode ser clonada";
        exit;
    }
    
    public static function getInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Conexao();
        }
        
        return self::$instancia;
    }
}
