<?php

$aluno = array();
$aluno['RA'] = '06001234';
$aluno['nome'] = 'Alisson Chiquitto';
$aluno[10] = '10101';
$aluno[5] = 555;
$aluno[] = 'ABC';

$professor = array(
	'matricula' => 8888,
	'nome' => 'Chiquitto',
	'salario' => '9999centavos',
);

print_r($professor);

echo $aluno['RA'];

?>