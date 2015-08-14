<?php

class Configuracoes {
  private $config = array(
    'FUSO' => '+3',
    'NOME_SISTEMA' => 'Loja do seu Zeh',
    'SALDO_MIN' => 5,
  );
  
  public function __construct() {
      echo "Instancia de Configuracoes criada <br>";
  }

  public function getConfig($indice) {
    return $this->config[$indice];
  }
}
