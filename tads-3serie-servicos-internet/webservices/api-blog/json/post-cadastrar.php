<?php

 require '../config.php';
 
 $idcategoria = (int) $_POST['idcategoria'];
 $titulo = $_POST['titulo'];
 $texto = $_POST['texto'];
 
 $con = Conexao::getInstance();
 $sql = "select idcategoria from categoria
            where idcategoria = $idcategoria";
 $consulta = $con->query($sql);
 $idcategoriaBd = $consulta->fetch(PDO::FETCH_ASSOC);
 if(!$idcategoriaBd){
     saidaJson(array(), Erros::CATEGORIA_INEXISTENTE);
 }
 
 $sql = "SELECT IDPOST FROM POST WHERE TITULO ='$titulo'";
 $result = $con->query($sql);
 $teste = $result->fetch(PDO::FETCH_ASSOC);
 if($teste){
     saidaJson(array(
         'idpost' => (int) $teste['IDPOST']
     ), Erros::POST_TITULO_EXISTENTE);
     exit;
 }
     
 $contarTexto = strlen($texto);
 if($contarTexto <50){
     saidaJson(array(),  Erros::POST_TEXTO_INSUFICIENTE) ;
 }
 
 $sql = "insert into post(idcategoria,titulo,texto) values($idcategoria,'$titulo','$texto')";
 $con->exec($sql);
 $idpost = (int) $con->lastInsertId();
 $dados = array(
    'idpost' => $idpost 
 );
 saidaJson($dados);

