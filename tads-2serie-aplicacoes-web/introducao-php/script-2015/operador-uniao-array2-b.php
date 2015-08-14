<?php

$cliente = array(
	'id' => 10,
	'nome' => 'Maca',
	'email' => 'banana@split.com',
);

$contato = array(
	'id' => 10,
	'telefone' => '4456456',
	'celular' => '(44) 546465',
);

$cliente = $cliente + $contato;
