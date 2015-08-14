<?php


require './Conta.php';
require './ContaPoupanca.php';

$cp = new ContaPoupanca();

$cp->deposito(400);
$cp->calculaRendimento();

echo $cp->pegarSaldo();
