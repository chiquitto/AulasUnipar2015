<?php

require './Conta.php';

$c1 = Conta::novaConta(123456, 'Rafael');
$c2 = Conta::novaConta(123452, 'Eduardo');


print_r(Conta::$contas);