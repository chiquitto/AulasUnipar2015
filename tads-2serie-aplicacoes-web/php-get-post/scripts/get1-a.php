<?php

$fruta = $_GET['fruta'];

if ( isset($_GET['quantidade']) ) {
	$qtd = $_GET['quantidade'];
}
else {
	$qtd = 0;
}

echo "O cara vendeu $qtd $fruta(s)";