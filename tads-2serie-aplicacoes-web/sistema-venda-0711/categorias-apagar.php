<?php

require './protege.php';
require './config.php';
require './lib/conexao.php';
require './lib/funcoes.php';

$idcategoria = (int) $_GET['idcategoria'];

$sql = "SELECT count(*) contador FROM produto WHERE idcategoria = $idcategoria";
$consulta = mysqli_query($con, $sql);
$retorno = mysqli_fetch_assoc($consulta);
if ($retorno['contador'] > 0) {
	javascriptAlertFim('Categoria não pode ser apagada pois contém produtos!', 'categorias.php');
}

$sql = "DELETE FROM categoria WHERE idcategoria = $idcategoria";
$recebe = mysqli_query($con, $sql);
javascriptAlertFim('Categoria Apagada', 'categorias.php');

