<?php


require './Conta.php';
require './ContaEspecial.php';

$ce = new ContaEspecial();

$ce->saque(93);
$ce->calculaJuros();
echo $ce->pegarSaldo();