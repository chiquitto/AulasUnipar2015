<?php

require '../config.php';

$categoria = $_POST['categoria'];

if ($categoria == '') {
    saidaJson(array(), Erros::CATEGORIA_VAZIO);
}

$con = Conexao::getInstance();

$sql = "Insert Into categoria (categoria)
    Values ('$categoria')";

$con->exec($sql);

$idcategoria = (int) $con->lastInsertId();

$dados = array(
    'idcategoria' => $idcategoria,
);

saidaJson($dados);