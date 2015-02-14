<?php


require './Conta.php';
require './ContaCorrente.php';

$cc = new ContaCorrente();

$cc->deposito(200);
$cc->saque(250);

echo $cc->pegarSaldo();