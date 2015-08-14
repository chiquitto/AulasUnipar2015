<?php

for ($n = 0; $n < 100; $n++) {
	if ( ($n % 2) == 1 ) {
		continue;
	}

	echo "$n <br>";
}