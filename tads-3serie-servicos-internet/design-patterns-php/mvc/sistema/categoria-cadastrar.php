<?php

require 'config.php';
require './classes/Controller.php';
require './classes/Controller/Categoria.php';
require './classes/View.php';
require './classes/Dao.php';
require './classes/Vo.php';
require './classes/Vo/Categoria.php';
require './classes/Dao/Categoria.php';

$controller = new Controller_Categoria();
$controller->cadastrarAcao();
