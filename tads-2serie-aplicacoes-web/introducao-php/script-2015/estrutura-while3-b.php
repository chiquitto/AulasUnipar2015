<?php

$clientes = array();
$clientes[] = array(
	'nome' => 'Zeh',
	'fone' => '11111111',
);
$clientes[] = array(
	'nome' => 'Jao',
	'fone' => '22222222',
);
$tamanho = count($clientes);

$i = 0;
while ($i < $tamanho) {
	$cliente = $clientes[$i];

	// $nome = $clientes[$i]['nome'];
	$nome = $cliente['nome'];
	$fone = $cliente['fone'];

	echo "Cliente: $nome - $fone <br>";

	$i++;
}





