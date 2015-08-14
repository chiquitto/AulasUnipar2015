<?php

require './Conta.php';
require './ContaPoupanca.php';

$cp = new ContaPoupanca();

$cp->deposito(200);

$cp->virarMes();

$cp->saque(200);

echo $cp->pegarSaldo();
