<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar produto</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-headphones"></i> Cadastrar produto</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="produtos-cadastrar.php">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcategoria">Categoria</label>
                <select class="form-control" id="fcategoria" name="categoria">
                  <option value="">--</option>
                  <option value="1">Categoria 1</option>
                  <option value="2">Categoria 2</option>
                </select>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fproduto">Produto</label>
                <input type="text" class="form-control" id="fproduto" name="produto" placeholder="Nome do produto">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fprecocompra">Preço de compra</label>
                <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" id="fprecocompra" name="precocompra">
                </div>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="fprecovenda">Preço de venda</label>
                <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" id="fprecovenda" name="precovenda">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fsaldo">Saldo</label>
                <input type="number" class="form-control" id="fsaldo" name="saldo">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
          </div>
        </div>
      </form>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>