<?php

require '../config.php';

$idcategoria = (int) $_GET['idcategoria'];

$sql = "Select idcategoria, categoria
From categoria Where idcategoria = $idcategoria";

$con = Conexao::getInstance();
$consulta = $con->query($sql);

// Problema de nao existir o registro
$categoria = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$categoria) {
    header('HTTP/1.0 404 Not Found');
    exit;
}

$categoria['idcategoria'] = (int) $categoria['idcategoria'];

header('Content-Type: application/json');
echo json_encode($categoria);
