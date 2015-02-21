<?php

require 'AreaCalculavel.php';
require 'Quadrado.php';
require 'Circulo.php';

class Test {
    public function
    mostrarInformacoes(AreaCalculavel $figura) {
        $area = $figura->calculaArea();
        
        echo "A area da figura eh " . $area;
    }
}

$q = new Quadrado();
$q->definirLado(20);

$t = new Test();
$t->mostrarInformacoes($q);
