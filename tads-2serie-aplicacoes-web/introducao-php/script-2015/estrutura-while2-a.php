<?php

$a = array();
$i = 0;
while ($i <= 10) {
	if ( ($i % 2) == 0 ) {
		$a[] = $i;
	}
	$i++;
}

$a = array();
$i = 0;
while ($i <= 10) {
	$a[] = $i;
	$i += 2;
}

print_r($a);