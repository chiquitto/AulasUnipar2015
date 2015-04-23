<?php

$json = '[{"nome":"Unipar","endereco":"Av Brasil"},{"nome":"Chiquitto","endereco":"Cianorte"}]';

$dados = json_decode($json, true);

print_r($dados);
