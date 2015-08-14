<?php

class OracleConexao
implements Conexao {
    public function abrirConexao() {
        echo "Abrir conexao Oracle<br>";
    }

    public function delete($id) {
        echo "Deletar registro Oracle<br>";
    }

    public function fecharConexao() {
        echo "Fechar conexao Oracle<br>";
    }

    public function insert() {
        echo "Insert registro Oracle<br>";
    }

    public function select() {
        echo "Selecionar registro Oracle<br>";
    }

    public function update() {
        echo "Atualizar registro Oracle<br>";
    }

}