<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$idcliente = (int) $_GET['idcliente'];

// @TODO
// consultar se o cliente existe e se ele esta ativo
// se uma das condições acima for falsa entao mostra msg de erro

$idusuario = $_SESSION['idusuario'];
$situacao = VENDA_ABERTA;
$data = date('Y-m-d H:i:s');

$sql = "INSERT INTO venda (idusuario, situacao, data, idcliente)
        VALUES ($idusuario, '$situacao', '$data', $idcliente)";
$q = mysqli_query($con, $sql);
$idvenda = mysqli_insert_id($con);

$_SESSION['idvenda'] = $idvenda;

header('location:venda-produto.php');
