<?php

class Conexao{
    private static $var; 
    private function __construct() {
        echo "abrir conexao<br>";
    }
    public static function getConexao(){
        if (self::$var === NULL){
            self::$var = new Conexao;
        }
        return self::$var;
    } 
    public function __clone() {
        echo "A conexao nao pode ser clonada";
        exit;
    }
}
