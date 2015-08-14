<?php

interface Conexao {
    public function abrirConexao();
    public function fecharConexao();
    
    // CRUD
    public function insert();
    public function select();
    public function update();
    public function delete($id);
}
