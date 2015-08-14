<?php

require 'config.php';

$dados = array(
    'titulo'=>'aulaChico',
    'texto'=>'',
    'idcategoria'=>1  
    );

$url = 'http://127.0.0.1/webservices/api-blog/json/post-cadastrar.php';

$cadastrar = httpPost($dados, $url);
$recebe = json_decode($cadastrar, true);

if ($recebe['erro']==0){
    echo "O post {$dados['titulo']}
     foi gravado com sucesso. Id gerado
    {$recebe['dados']['idpost']}";
}else{
    echo "Erro: ".$recebe['erro'].
         " - ".$recebe['erroMsg'];
}
