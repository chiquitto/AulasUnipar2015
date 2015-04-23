<?php

require '../config.php';

$con= Conexao::getInstance();

$sql = "select * from post";

$consulta = $con->query($sql);

$post = array();
while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
    $linha['idpost']= (int) $linha['idpost'];
    $post[]= $linha;
}

echo json_encode($post);