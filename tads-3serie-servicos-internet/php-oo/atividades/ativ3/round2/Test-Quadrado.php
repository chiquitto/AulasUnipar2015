<?php

require 'AreaCalculavel.php';
require 'Quadrado.php';

$q = new Quadrado();

$q->definirLado(4);

echo $q->calculaArea();

?>
