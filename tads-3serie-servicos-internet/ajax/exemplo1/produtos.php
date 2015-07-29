<?php

$produtos = array();

$produtos[] = array(
	'id' => 1,
	'descricao' => 'Refrigerante Lata',
	'saldo' => 10,
	'preco' => 3.00
);

$produtos[] = array(
	'id' => 2,
	'descricao' => 'Refrigerante 1L',
	'saldo' => 5,
	'preco' => 4.50
);

$produtos[] = array(
	'id' => 3,
	'descricao' => 'Refrigerante Pet 2.5L',
	'saldo' => 5,
	'preco' => 6.70
);

echo json_encode($produtos);
