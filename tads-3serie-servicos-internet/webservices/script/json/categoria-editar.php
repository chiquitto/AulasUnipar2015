<?php

require '../config.php';

$idcategoria = (int) $_POST['idcategoria'];
$categoria = $_POST['categoria'];

$con = Conexao::getInstance();

$sql = "Select categoria From categoria
    Where idcategoria = $idcategoria";
$consulta = $con->query($sql);
$registro = $consulta->fetch(PDO::FETCH_ASSOC);
if (!$registro) {
    saidaJson(array(), Erros::CATEGORIA_INEXISTENTE);
}

if ($categoria == '') {
    saidaJson(array(), Erros::CATEGORIA_VAZIO);
}

$sql = "Update categoria Set 
    categoria='$categoria'
    Where idcategoria = $idcategoria";

$con->exec($sql);

saidaJson(array());
