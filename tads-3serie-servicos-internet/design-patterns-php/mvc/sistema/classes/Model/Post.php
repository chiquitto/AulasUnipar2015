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
        $this->validarCampos($voPost);
        $dao = new Dao_Post();
        $dao->update($voPost);
        
        
    }
    
    private function validarCampos(Vo_Post $voPost){
        if(trim($voPost->titulo) === '') {
            throw new Exception_Post_TituloVazio();
        }
        else if(trim($voPost->texto)==='') {
            throw new Exception_Post_TextoVazio();
        }

        
    }

}
