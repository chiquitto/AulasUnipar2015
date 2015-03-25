<?php

$a = array();
$b = array(0,2,4,6,8,10);

$b[1] = 12;
$b[6] = 12;
$b[] = 20;
$b[] = 30;

print_r($b);
//var_dump($b);

?>