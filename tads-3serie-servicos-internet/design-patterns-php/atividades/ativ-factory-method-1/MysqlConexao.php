<?php

class MysqlConexao
implements Conexao {

    public function abrirConexao() {
        $login = 'root';
        $senha = '';
        echo "Abrir conexao Mysql<br>";
    }

    public function delete($id) {
        echo "Deletar registro $id Mysql<br>";
    }

    public function fecharConexao() {
        echo "Fechar conexao Mysql<br>";
    }

    public function insert() {
        echo "Inserir registro Mysql<br>";
    }

    public function select() {
        echo "Selecionar registro Mysql<br>";
    }

    public function update() {
        echo "Atualizar registro Mysql<br>";
    }

}