<?php

require '../config.php';

$con = Conexao::getInstance();

$sql = "SELECT
    idcategoria, categoria
    FROM categoria
";

$consulta = $con->query($sql);

$categorias = array();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $categorias[] = $linha;
}

echo json_encode($categorias);
