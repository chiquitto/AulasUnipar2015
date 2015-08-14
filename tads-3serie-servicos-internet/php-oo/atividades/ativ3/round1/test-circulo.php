<?php

require 'AreaCalculavel.php';
require 'Circulo.php';

$f = new Circulo();
$f->definirRaio(10);

$area = $f->calculaArea();

echo "A area do circulo com raio 10 eh " . $area;
echo "<br>";

echo Circulo::PI;
