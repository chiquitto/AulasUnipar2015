<?php

$clientes = array();

$cliente1 = array();
$cliente1['nome'] = 'Alisson Chiquitto';
$cliente1['endereco'] = 'Av Brasil';
$cliente1['telefone'] = '44 9999 9999';

$clientes[] = $cliente1;

$cliente2 = array(
	'nome' => 'Jose Abreu',
	'endereco' => 'Av Santa Catarina',
	'telefone' => '11 95555 5555'
);

$clientes[] = $cliente2;

$clientes[] = array(
	'nome' => 'Juvenil',
	'endereco' => 'Av SP',
	'telefone' => '12 3456 7890',
);

//print_r($clientes);

echo $clientes[2]['endereco'];

