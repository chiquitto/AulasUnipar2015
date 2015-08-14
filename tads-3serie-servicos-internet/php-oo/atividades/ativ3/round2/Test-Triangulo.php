<?php

require 'AreaCalculavel.php';
require 'Triangulo.php';

$t = new Triangulo();

$t->definirAltura(10);
$t->definirLargura(20);

echo $t->calculaArea();

