<?php

require '../config.php';

$clientes = array();
$clientes[] = array(
    'nome' => 'Unipar',
    'endereco' => 'Av Brasil',
);
$clientes[] = array(
    'nome' => 'Chiquitto',
    'endereco' => 'Cianorte',
);

echo json_encode($clientes);
