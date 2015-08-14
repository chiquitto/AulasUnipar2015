<?php

function atualizaContador($i) {
	return $i = $i + 1;
}

$o = 0;
$o = atualizaContador($o);
$o = atualizaContador($o);

// echo $o;

// ===

function incrementaContador(& $i) {
	$i = $i + 1; 
}

$o = 0;
incrementaContador($o);
incrementaContador($o);
incrementaContador($o);

echo $o;
