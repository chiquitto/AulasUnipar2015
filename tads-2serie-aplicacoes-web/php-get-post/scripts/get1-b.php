<?php

$nome = $_GET['nome'];

if ( isset($_GET['idade']) ) {
	echo "A idade de $nome eh " . $_GET['idade'];
}
else {
	echo "A idade de $nome eh desconhecida";
}