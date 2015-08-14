<?php

function somatorio ($n) {
	$r = 0;
	for ($i = 1; $i <= $n; $i++) {
		$r += $i;
	}
	return $r;
}