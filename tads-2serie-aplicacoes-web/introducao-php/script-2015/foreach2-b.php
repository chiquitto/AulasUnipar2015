<?php

$cliente = array(
	'nome' => 'Unipar',
	'cidade' => 'Umuarama',
	'uf' => 'PR',
	'unidades' => 10,
);

foreach ($cliente as $valor) {
	echo $valor, '<br>';
}

foreach ($cliente as $key => $valor) {
	echo "$key = $valor <br>";
}
