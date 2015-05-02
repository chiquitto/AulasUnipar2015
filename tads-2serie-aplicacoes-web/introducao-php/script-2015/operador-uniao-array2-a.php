<?php

$cidade = array(
	'id' => 10,
	'nome' => 'Cianorte',
	'uf' => 'PR'
);

$array = array(
	'id' => 10,
	'populacao' => 500000,
	'renda' => 2500,
);


$cidade = $cidade + $array;
print_r($cidade);

