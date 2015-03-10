<?php

require './Fabrica.php';
require './Automovel.php';
require './Automovel1000cc.php';
require './Automovel1400cc.php';
require './Automovel2000cc.php';

$modelo = Fabrica::construirAutomovel('1400cc');
$modelo->ligar();
$modelo->acelerar();
$modelo->virar();
$modelo->frear();
$modelo->desligar();