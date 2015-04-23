<?php

function imc($peso, $altura, $echo = true) {
	$imc = $peso / ($altura * $altura);

	if ($echo == true) {
		echo $imc;
	} else {
		return $imc;
	}
}

$imc = imc(80, 1.8, false);
$imc = number_format($imc, 2);

echo $imc;