<?php

class Controller_Categoria
extends Controller {
    
    public function cadastrarAcao () {
        $view = $this->getView();
        
        if ($_POST) {
            $categoria = $_POST['categoria'];
            
            if ($categoria == '') {
                $view->setValor('erro',
                        'Preencha o nome da categoria');
            }
            else
            {
                $dao = new Dao_Categoria();
                $vo = new Vo_Categoria();
                $vo->categoria = $categoria;
                $vo->idcategoria = 1;
                //$dao->create($vo);
                //$dao->delete('id = 1');
                $dao->update($vo);
            }
        }
        
        $view->setValor('nome', 'Unipar 11/03');
        
        $view->mostrar('categoria-cadastrar');
    }
    
}