<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$periodo = (int) $_GET['periodo'];
switch($periodo) {
  case 1:
    $dataI = strtotime('today-6day');
    $dataF = strtotime('tomorrow')-1;
}

$where = array();

$dataI = date('c', $dataI);
$dataF = date('c', $dataF);
$where[] = "(data BETWEEN '$dataI' AND '$dataF')";

$where = join(' AND ', $where);

$sql = "Select
  v.idvenda,
  c.idcliente, c.nome,
  vi.precopago, vi.qtd, Sum(vi.precopago * vi.qtd) itemTotal
From venda v
Inner Join cliente c On (c.idcliente = v.idcliente)
Inner Join vendaitem vi On (vi.idvenda = v.idvenda)
Where $where
Group By v.idvenda
";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compras por cliente</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-reorder"></i> Compras por cliente</h1>
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
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{idcliente}</td>
                  <td>{clienteNome}</td>
                  <td>{precoTotal}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td>Total:</td>
                  <td>{total}</td>
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