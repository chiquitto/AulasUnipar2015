<?php

require '../config.php';
 
$idpost = (int) $_POST['idpost'] ;
$idCategoria = (int) $_POST['idcategoria'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];

$con = Conexao::getInstance();

$sql = "Select idcategoria from categoria where idcategoria = $idCategoria";

$resultado = $con->query($sql);
$categoria = $resultado->fetch(PDO::FETCH_ASSOC);
if (!$categoria){
    saidaJson(array(), Erros::CATEGORIA_INEXISTENTE);
}

$sql = "select idpost from post where titulo = '$titulo' and idpost <> $idpost";
$resultado = $con->query($sql);
$tituloexiste = $resultado->fetch(PDO::FETCH_ASSOC);

if ($tituloexiste){
    saidaJson(array('idpost'=>$tituloexiste['idpost']),  Erros::POST_TITULO_EXISTENTE);
}



