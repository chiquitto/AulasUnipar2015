<?php

require 'conexao.php';

$sql = "Select * From cliente Where id=1";

$resultado = mysqli_query($con, $sql);

$cliente = mysqli_fetch_assoc($resultado);

var_dump($cliente);

$cliente = mysqli_fetch_assoc($resultado);

var_dump($cliente);