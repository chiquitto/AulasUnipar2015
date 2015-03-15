<?php

class Model_Categoria extends Model{
    public function 
            cadastrar(Vo_Categoria $voCategoria){
     if ($voCategoria->categoria === ''){
         
         throw new Exception_Categoria_Vazio();
     }
     $dao = new Dao_Categoria();
     $dao->create($voCategoria);
    }
}