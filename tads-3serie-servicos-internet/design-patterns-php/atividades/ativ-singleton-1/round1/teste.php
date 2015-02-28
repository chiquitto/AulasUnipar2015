<?php

require './Conexao.php';

class TesteX {
    public function fazerConsulta() {
        $con = Conexao::getInstancia();
        echo "Fazer consulta <br>";
    }
}

class TesteY {
    public function fazerInclusao() {
        $con = Conexao::getInstancia();
        
        // Erro aqui
        // $con1 = clone $con;
        
        echo "Fazer inclusao <br>";
    }
}

$x = new TesteX();
$x->fazerConsulta();
$x->fazerConsulta();

$y = new TesteY();
$y->fazerInclusao();
$y->fazerInclusao();
