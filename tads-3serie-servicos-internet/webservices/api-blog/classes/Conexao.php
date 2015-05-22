<?php

/**
 * Classe de Conexao
 *
 * @author alisson
 */
class Conexao extends PDO {

    private $dsn = 'mysql:host=localhost;dbname=blog';
    private $user = 'root';
    private $password = '123456';
    private static $instancia;

    public function __construct() {
        try {
            parent::__construct($this->dsn, $this->user, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->query('SET NAMES UTF8');
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
            self::$instancia = new Conexao();
        }
        return self::$instancia;
    }

}
