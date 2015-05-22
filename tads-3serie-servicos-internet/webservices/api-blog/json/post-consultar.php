<?php
require '../config.php';

$idpost = (int) $_GET['idpost'];

$con = Conexao::getInstance();

$sql = "Select idpost, idcategoria, titulo, texto 
       from post 
       where idpost = $idpost";

$consulta = $con->query($sql);
$post = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header('HTTP/1.0 404 Not Found');
    saidaJson(array(), Erros::POST_INEXISTENTE);
}

$post['idpost'] = (int) $post['idpost'];
$post['idcategoria'] = (int) $post['idcategoria'];

saidaJson($post);
