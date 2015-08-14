<?php

require './Conta.php';
require './ContaEspecial.php';

$ce = new ContaEspecial();
$ce->definirLimite(100);

$ce->saque(50);
$ce->saque(50);

//$ce->deposito(150);

$ce->virarMes();
$ce->virarMes();
$ce->virarMes();

echo $ce->pegarSaldo();