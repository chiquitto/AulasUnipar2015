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
        $view = $this->getView();
        
        if($_POST){
            $idpost = (int) $_POST['idpost'];
            $idcategoria = (int) $_POST['idcategoria'];
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];
            
            $voPost = new Vo_Post();
               
            $voPost->idpost = $idpost;
            $voPost->idcategoria = $idcategoria; //by conz
            $voPost->titulo = $titulo;
            $voPost->texto = $texto;
            
            $postModel = new Model_Post();
            try{
                $postModel->editar($voPost);
                header("location:post-editar.php?idpost=$idpost"); 
                exit;
            } catch (Exception_Post_TextoVazio $exTexto) {
                $view->setValor('erro', "Preencha o campo texto!");
            } catch (Exception_Post_TituloVazio $exTitulo){
                $view->setValor('erro', "Preencha o campo título!");
            }

        }
        else {
            $idpost = (int) $_GET['idpost'];
            $dao = new Dao_Post();
        
            $retorno = $dao->request("idpost = $idpost");
            if(!isset($retorno[0])){
                echo 'Nenhum Post encontrado';
                exit;
            }
            $voPost = $retorno[0];
        }
        
        $daoCategoria = new Dao_Categoria();
        $listaCategoria = $daoCategoria->request();
        
        $view->setValor('categorias',$listaCategoria);
           
        $view->setValor('post', $voPost);
        $view->mostrar('post-editar');
    }
}