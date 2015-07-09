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
    <title>Cadastrar cidade</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-building"></i> Cadastrar cidade</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="cidades-cadastrar.php">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-2">
              <div class="form-group">
                <label for="fuf">UF</label>
                <select type="text" class="form-control" id="fuf" name="uf">
                  <option value="">--</option>
                  <option value="aa">AA</option>
                  <option value="bb">BB</option>
                </select>
              </div>
            </div>
            <div class="col-xs-10">
              <div class="form-group">
                <label for="fcidade">Cidade</label>
                <input type="text" class="form-control" id="fcidade" name="cidade" placeholder="Nome da cidade">
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