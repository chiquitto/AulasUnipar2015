<?php

// Atribuição por valor
$x = 1;
$y = $x;
$x = 2;
echo $y;

// Atribuicao por referencia
$a = 1;
$b = & $a;
$a = 2;
echo $b;
