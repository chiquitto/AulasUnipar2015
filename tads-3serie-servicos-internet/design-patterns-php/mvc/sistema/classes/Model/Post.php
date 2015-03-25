<?php

class Model_Post extends Model {

    public function cadastrar(Vo_Post $voPost) {
        if ($voPost->titulo === '') {
            throw new Exception_Post_TituloVazio();
        }
        
        $dao = new Dao_Post();
        $dao->create($voPost);
    }

    public function editar(Vo_Post $voPost) {
        if ($voPost->titulo == '') {
            throw new Exception_Post_TituloVazio();
        }
        $dao = new Dao_Post();
        $dao->update($voPost);
    }

}
