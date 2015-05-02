<?php

require '../config.php';

$con= Conexao::getInstance();

$sql = "select * from post";

if (isset($_GET['idcategoria'])) {
    $idcategoria = (int) $_GET['idcategoria'];
    $sql .= " Where idcategoria = $idcategoria";
}

$consulta = $con->query($sql);

$post = array();
while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
    $linha['idpost']= (int) $linha['idpost'];
    $linha['idcategoria'] = (int) $linha['idcategoria'];
    $post[]= $linha;
}

header('Content-Type: application/json');
echo json_encode($post);