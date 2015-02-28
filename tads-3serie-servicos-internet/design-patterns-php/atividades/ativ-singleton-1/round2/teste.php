<?php
require 'Conexao.php';

class TesteX{
    public function fazerConsulta(){
        $con = Conexao::getConexao();
        $con1 = clone $con; 
        echo "Fazer consulta<br>";
        
    }
}

class TesteY{
    public function fazerInclusao(){
        $con = Conexao::getConexao();
        $con1 = clone $con;
        echo "Fazer inclusao<br>";
    }
}

$testex = new TesteX();
$testex->fazerConsulta();

$testey = new TesteY();
$testey->fazerInclusao();

