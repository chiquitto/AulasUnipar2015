<?php

require 'config.php';

$dados = array(
    'categoria' => 'Entretenimento'
);

$url = 'http://127.0.0.1/webservices/api-blog/json/categoria-cadastrar.php';

$r = httpPost($dados, $url);

$dados = json_decode($r, true);

print_r($dados);
