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
    <title>Compras - Valor de venda x Valor pago</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-reorder"></i> Compras - Valor de venda x Valor pago</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="get" action="rel2-imprimir.php">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fsenha">Período</label>
                <select id="fcategoria" name="periodo" class="form-control" required>
                  <option value="1">Última semana</option>
                  <option value="2">Últimos quinze dias</option>
                  <option value="3">Últimos 30 dias</option>
                  <option value="4">Últimos 3 meses</option>
                  <option value="5">Neste ano</option>
                  <option value="6">Último ano</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class=" col-xs-12">
              <button type="submit" class="btn btn-primary">Gerar relatório</button>
            </div>
          </div>

        </div>
      </form>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>