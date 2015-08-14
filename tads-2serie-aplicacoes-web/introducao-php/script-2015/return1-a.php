<?php

function potencia ($base, $expoente) {
	$r = $base;

	for ($i = 2; $i <= $expoente; $i++) {
		if ($r > 65000) {
			return 65000;
		}

		$r *= $base;
	}

	return $r;
}

echo potencia (2,16);