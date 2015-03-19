<?php

class Controller_Categoria
extends Controller {
    
    public function cadastrarAcao () {
        $view = $this->getView();
        
        if ($_POST) {
            $categoria = $_POST['categoria'];
            $modelo = new Model_Categoria();
            $voCategoria = new Vo_Categoria();
            $voCategoria->categoria = $categoria;
            try{
                $modelo->cadastrar($voCategoria);
            }
            catch(Exception_Categoria_Vazio $ex){
                $view->setValor("erro",
                        "Favor informe categoria!");

              
            }
            
        }
        
        $view->setValor('nome', 'Unipar 11/03');
        
        $view->mostrar('categoria-cadastrar');
    }
    public function listarCategoriaAcao() {
        
        $dao = new Dao_Categoria();
        $retorno = $dao->request();
        
        $view = $this->getView();
        
        $view->setValor('categorias', $retorno);
        $view->mostrar('categoria-listar');
    }
    
}