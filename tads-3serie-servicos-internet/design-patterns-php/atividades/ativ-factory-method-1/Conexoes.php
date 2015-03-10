<?php

// Fabrica
class Conexoes {
    public static function factory($tipo) {
        $conexao = null;
        
        switch ($tipo) {
            case 'mysql':
                $conexao = new MysqlConexao();
                break;
            
            case 'oracle':
                $conexao = new OracleConexao();
                break;

            default:
                echo "Nenhum tipo selecionado";
                exit;
                break;
        }
        
        $conexao->abrirConexao();
        return $conexao;
    }
}