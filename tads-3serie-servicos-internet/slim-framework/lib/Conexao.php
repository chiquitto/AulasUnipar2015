<?php

/**
 * Classe de Conexao
 *
 * @author alisson
 */
class Conexao extends PDO {

    private $dsn;
    private $user;
    private $password;
    private static $instancia;

    function __construct() {
        $this->dsn = 'mysql:host=' . BD_HOST . ';dbname=' . BD_NOME;
        $this->user = BD_USUARIO;
        $this->password = BD_SENHA;

        try {
            parent::__construct($this->dsn, $this->user, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this -> exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Conexão falhou. Erro: " . $e->getMessage();
            exit;
        }
    }

    /**
     * 
     * @return Conexao
     */
    public static function getInstance() {
        if (null === self::$instancia) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

}
