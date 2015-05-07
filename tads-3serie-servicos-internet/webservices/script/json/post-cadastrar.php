<?php

 require '../config.php';
 
 $idcategoria = $_POST['idcategoria'];
 $titulo = $_POST['titulo'];
 $texto = $_POST['texto'];

 $con = Conexao::getInstance();
 $sql = "insert into post(idcategoria,titulo,texto) values($idcategoria,'$titulo','$texto')";
 $con->exec($sql);
 $idpost = (int) $con->lastInsertId();
 $dados = array(
    'idpost' => $idpost 
 );
 saidaJson($dados);

