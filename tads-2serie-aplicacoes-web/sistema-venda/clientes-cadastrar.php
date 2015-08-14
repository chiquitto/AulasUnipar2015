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
    <title>Cadastrar cliente</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-heart"></i> Cadastrar cliente</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="clientes-cadastrar.php">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcliente">Cliente</label>
                <input type="text" class="form-control" id="fcliente" name="cliente" placeholder="Nome completo">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="femail">Email</label>
                <input type="text" class="form-control" id="femail" name="email">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcpf">CPF</label>
                <input type="text" class="form-control" id="fcpf" name="cpf" placeholder="Somente números" maxlength="11">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcidade">Cidade</label>
                <select class="form-control" id="fcidade" name="cidade">
                  <option value="">--</option>
                  <option value="1">Cidade 1</option>
                  <option value="2">Cidade 2</option>
                </select>
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