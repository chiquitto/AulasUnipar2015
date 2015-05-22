<?php

require '../config.php';

$idpost = (int) $_GET['idpost'];

$con = Conexao::getInstance();

$sql = "select idpost from post "
        . "where idpost = $idpost";

$consulta = $con->query($sql);
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$resultado) {
    saidaJson(array(), Erros::POST_INEXISTENTE);
}

$sql = "delete from post where idpost = $idpost";

try {
   $con->exec($sql);
} catch (Exception $exc) {
    saidaJson(array(), Erros::BD);
}

saidaJson(array());



