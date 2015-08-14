<?php

require '../config.php';

$idcategoria = (int) $_GET['idcategoria'];

$con = Conexao::getInstance();

$sql = "Select idpost From post
    Where idcategoria = $idcategoria";
$consulta = $con->query($sql);
$registro = $consulta->fetch(PDO::FETCH_ASSOC);
if ($registro) {
    saidaJson(array(
        'idpost' => (int) $registro['idpost']
    ), Erros::CATEGORIA_COM_POST);
}

$sql = "Delete From categoria
    Where idcategoria = $idcategoria";

try {
    $con->exec($sql);
} catch (Exception $ex) {
    saidaJson(array(), Erros::BD);
}

saidaJson(array());
