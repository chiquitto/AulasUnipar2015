<?php

require './Conta.php';

//$c1 = new Conta(123456, 'Chiquitto');

//if (!Conta::verificaContas(456789)) {
//    $c2 = new Conta(456789, 'Alexandre');
//}

//if (!Conta::verificaContas(500500)) {
//    $c3 = new Conta(500500, 'Renan');
//}

$c1 = Conta::novaConta(123456, 'Chiquitto');
$c2 = Conta::novaConta(456789, 'Alexandre');
$c3 = Conta::novaConta(500500, 'Renan');

print_r(Conta::$contas);

//print_r($c1);