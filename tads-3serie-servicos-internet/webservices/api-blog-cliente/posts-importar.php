<?php

$url = 'http://127.0.0.1/webservice/json/posts-consultar.php';

$dados = file_get_contents($url);

$dados = json_decode($dados,true);

print_r($dados);
