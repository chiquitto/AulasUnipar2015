<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';
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

      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Data</th>
                  <th>Valor de venda</th>
                  <th>Valor pago</th>
                  <th>Diferença</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{idvenda}</td>
                  <td>{clienteNome}</td>
                  <td>{vendaData}</td>
                  <td>{valorVenda}</td>
                  <td>{valorPago}</td>
                  <td>{vendaDifValores}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td>Total:</td>
                  <td>{valorVenda}</td>
                  <td>{valorPago}</td>
                  <td>{vendaDifValores}</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>