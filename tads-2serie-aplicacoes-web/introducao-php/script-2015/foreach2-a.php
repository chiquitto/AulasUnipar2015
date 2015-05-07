<?php

$computador = array(
	'cpu' => 'Intel I7',
	'ram' => '8GB',
	'vga'	=> 'GeForce 2GB',
	'teclado' => 'Sattelite',
	'mouse' => 'Clone 10 botoes',
);

/*foreach ( $computador as $peca ) {
	echo $peca, '<br>';
}*/

foreach ( $computador as $key => $peca ) {
	if ($key == 'vga') {
		continue;
	}
	echo "$key = $peca <br>";
}