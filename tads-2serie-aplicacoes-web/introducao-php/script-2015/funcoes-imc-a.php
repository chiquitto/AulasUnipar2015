<?php

function imc($peso, $altura, $echo = true) {
	$imc = $peso / ($altura * $altura);

	if ($echo == true) {
		echo $imc;
	}
	else {
		return $imc;
	}
}

$i = imc(80,1.80,false);
$i = number_format($i, 2);
echo $i;
