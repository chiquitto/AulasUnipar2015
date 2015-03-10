<?php

require 'config.php';
require './classes/Controller.php';
require './classes/Controller/Categoria.php';
require './classes/View.php';

$controller = new Controller_Categoria();
$controller->cadastrarAcao();
