<?php

class Controller_Categoria
extends Controller {
    
    public function cadastrarAcao () {
        $view = $this->getView();
        
        $view->setValor('nome', 'Unipar');
        
        $view->mostrar('categoria-cadastrar');
    }
    
}