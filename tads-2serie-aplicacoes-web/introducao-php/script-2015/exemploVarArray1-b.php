<?php

$a = array();
$b = array(10,20,30,40,50);

$b[2] = 100;
$b[5] = 60;
$b[] = 200;
$b[] = 300;

print_r($b);