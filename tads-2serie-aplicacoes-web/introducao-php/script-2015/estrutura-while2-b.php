<?php

// 0, 3, 6, 9, .., 60
$a = array();
$i = 0;

//while ($i <= 60) {
//	$a[] = $i;
//	$i += 3;
//}

while ($i <= 20) {
	$a[$i] = $i * 3;
	$i++;
}

print_r($a);