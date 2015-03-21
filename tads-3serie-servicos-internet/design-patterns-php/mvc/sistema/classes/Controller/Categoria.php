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

            try {
                $modelo->cadastrar($voCategoria);
            }
            catch(Exception_Categoria_Vazio $ex) {
                $view->setValor("erro",
                        "Favor informe categoria!");
            }
            
        }
        
        $view->setValor('nome', 'Unipar 11/03');
        
        $view->mostrar('categoria-cadastrar');
    }

    public function editarCategoriaAcao()
    {
        if($_POST) {
            $idcategoria = (int) $_POST['idcategoria'];
            $categoria = $_POST['categoria'];
            
            $voCategoria = new Vo_Categoria();
            $voCategoria->idcategoria = $idcategoria;
            $voCategoria->categoria = $categoria;

            $categoriaModel = new Model_Categoria();
            $categoriaModel->editar($voCategoria);

            header("location:categoria-editar.php?idcategoria=$idcategoria");
            exit;
        } else {
            $idcategoria = (int) $_GET['idcategoria'];
            $dao = new Dao_Categoria();
            $retorno = $dao->request("idcategoria = $idcategoria");
            if(!isset($retorno[0])) {
                echo "Registro não encontrado!";
                exit;
            }
            $categoria  = $retorno[0];
        }
        
        $view = $this->getView();
        $view->setValor('categoria',$categoria);
        $view->mostrar('categoria-editar');
    }

    public function listarCategoriaAcao() {
        $dao = new Dao_Categoria();
        $retorno = $dao->request();
        
        $view = $this->getView();
        
        $view->setValor('categorias', $retorno);
        $view->mostrar('categoria-listar');
    }
    
}