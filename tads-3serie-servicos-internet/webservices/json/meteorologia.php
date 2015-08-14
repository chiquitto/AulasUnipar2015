<?php

// http://www.previsaodotempo.org/api
// http://www.previsaodotempo.org/api.php?city=Cianorte

$cidade = 'Moscou';
$cidade = urlencode($cidade);

$url = "http://www.previsaodotempo.org/api.php?city=$cidade";

$requisicao = file_get_contents($url);

if (!$requisicao) {
	echo 'Houve uma falha ao fazer a requisicao';
	exit;
}

$dados = json_decode($requisicao, true);

//print_r($dados['data']['temperature']);

echo
	"A temperatura na cidade de "
	. $dados['data']['location']
	. " é "
	. $dados['data']['temperature'] . "ºF"
;
