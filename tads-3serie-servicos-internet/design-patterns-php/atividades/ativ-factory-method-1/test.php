<?php

require 'Conexao.php';
require 'MysqlConexao.php';
require 'OracleConexao.php';
require 'Conexoes.php';

$conexao1 = Conexoes::factory('mysql');
$conexao2 = Conexoes::factory('oracle');

$conexao1->delete(10);
$conexao1->select();

$conexao2->insert();