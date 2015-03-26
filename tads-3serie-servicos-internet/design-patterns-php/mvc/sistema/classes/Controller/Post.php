<?php

class Controller_Post
extends Controller {
    
    public function cadastrarAcao () {
        $view = $this->getView();
        
        if ($_POST) {
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];
            $idcategoria = (int) $_POST['idcategoria'];
            
            $voPost = new Vo_Post();
            $voPost->titulo = $titulo;
            $voPost->texto = $texto;
            $voPost->idcategoria = $idcategoria;

            $modelo = new Model_Post();
            try {
                $modelo->cadastrar($voPost);
            }
            catch(Exception_Post_TituloVazio $ex) {
                $view->setValor("erro",
                        "Favor informe titulo!");
            }
            
        }
        
        $categoriaDao = new Dao_Categoria();
        $categorias = $categoriaDao->request();
        
        $view->setValor('categorias', $categorias);
        
        $view->mostrar('post-cadastrar');
    }

    public function listarAcao() {
        $dao = new Dao_Post();
        $retorno = $dao->request();
        
        $view = $this->getView();
        
        $view->setValor('posts', $retorno);
        $view->mostrar('post-listar');
    }
    
    
    public function editarAcao(){
        $idpost = (int) $_GET['idpost'];
        $dao = new Dao_Post();
        
        $retorno = $dao->request("idpost = $idpost");
        if(!isset($retorno[0])){
            echo 'Nenhum Post encontrado';
            exit;
        }
        $post = $retorno[0];
        
        $daoCategoria = new Dao_Categoria();
        $listaCategoria = $daoCategoria->request();
        
        $view = $this->getView();
        $view->setValor('categorias',$listaCategoria);
           
        $view->setValor('post', $post);
        $view->mostrar('post-editar');
    }
}