<?php

$a = 10;
$b = 20;
$c = false;

if ($a == $b) {
	echo "A == B";
}

if ($a) {
	echo "A";
}

if (!$c) {
	echo "C";
}

if (!($a == $b)) {
	echo "A != B";
}

if ($a and $b) {
	echo "A == B";
}

if ($d = 20) {
	echo "20";
}