<?php

require '../config.php';

$categoria = $_POST['categoria'];

// Validacoes
if ($categoria == '') {
    saidaJson(array(), Erros::CATEGORIA_VAZIO);
}

$con = Conexao::getInstance();

$sql = "Select idcategoria From categoria
    Where (categoria = '$categoria')";
$resultado = $con->query($sql);
$categoriaBd = $resultado->fetch(PDO::FETCH_ASSOC);
if ($categoriaBd) {
    saidaJson(array(
        'idcategoria' => (int) $categoriaBd['idcategoria'],
    ), Erros::CATEGORIA_EXISTENTE);
}

$sql = "Insert Into categoria (categoria)
    Values ('$categoria')";

$con->exec($sql);

$idcategoria = (int) $con->lastInsertId();

$dados = array(
    'idcategoria' => $idcategoria,
);

saidaJson($dados);
