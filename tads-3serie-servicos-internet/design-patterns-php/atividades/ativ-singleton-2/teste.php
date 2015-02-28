<?php

require './Configuracoes.php';

class Pagina1 {
    public function __construct() {
        $config = new Configuracoes();
    }
}

class Pagina2 {
    public function __construct() {
        $config = new Configuracoes();
    }
}

$p1 = new Pagina1();
$p2 = new Pagina2();