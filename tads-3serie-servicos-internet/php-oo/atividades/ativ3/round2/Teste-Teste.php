<?php

require 'AreaCalculavel.php';
require 'Triangulo.php';
require 'Test.php';

$t = new Triangulo();

$t->definirAltura(5);
$t->definirLargura(10);

$teste = new Test();
$teste->mostrarInformacao($t);

