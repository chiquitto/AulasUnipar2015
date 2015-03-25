<?php

class Controller_Post
extends Controller {
    
    public function cadastrarAcao () {
        $view = $this->getView();
        
        if ($_POST) {
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];
            
            $voPost = new Vo_Post();
            $voPost->titulo = $titulo;
            $voPost->texto = $texto;
            $voPost->idcategoria = 1;

            $modelo = new Model_Post();
            try {
                $modelo->cadastrar($voPost);
            }
            catch(Exception_Post_TituloVazio $ex) {
                $view->setValor("erro",
                        "Favor informe titulo!");
            }
            
        }
        
        $view->mostrar('post-cadastrar');
    }

    public function listarAcao() {
        $dao = new Dao_Post();
        $retorno = $dao->request();
        
        $view = $this->getView();
        
        $view->setValor('posts', $retorno);
        $view->mostrar('post-listar');
    }
    
}