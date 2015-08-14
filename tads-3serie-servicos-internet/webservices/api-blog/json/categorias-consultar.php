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
    $linha['idcategoria'] = (int) $linha['idcategoria'];
    $categorias[] = $linha;
}

saidaJson($categorias);