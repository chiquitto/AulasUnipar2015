<?php

require './Conta.php';
require './ContaCorrente.php';

$cc = new ContaCorrente();
$cc->deposito(200);
$cc->saque(100);
$cc->saque(100);

echo $cc->pegarSaldo();
