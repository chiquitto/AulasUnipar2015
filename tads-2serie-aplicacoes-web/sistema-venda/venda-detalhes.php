<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msgOk = array();
$msgAviso = array();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes da venda</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-shopping-cart"></i> Venda #{idvenda}</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msgOk) {
          msgHtml($msgOk, 'success');
      }
      if ($msgAviso) {
          msgHtml($msgAviso, 'warning');
      }
      ?>
      
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Produtos da venda</h3>
            </div>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Qtd.</th>
                  <th>Produto</th>
                  <th>Preço unitário</th>
                  <th>Preço total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>{qtd}</td>
                  <td>{produto}</td>
                  <td>{preco_unitario}</td>
                  <td>{preco_total}</td>
                  <td><a href="venda-produto.php?acao=2&idproduto={idproduto}" title="Remover produto da venda"><i class="fa fa-times fa-lg"></i></a></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th colspan="2">Total da venda</th>
                  <th>{total}</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

      <form class="form-horizontal row" method="post" action="venda-fechar.php">
        <div class="col-xs-12">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Fechamento da venda</h3>
            </div>

            <div class="panel-body">

              <div class="form-group">
                <label for="fcliente" class="col-sm-2 control-label">Código:</label>
                <div class="col-sm-2">
                  <p class="form-control-static">{idvenda}</p>
                </div>

                <label for="fcliente" class="col-sm-2 control-label">Data:</label>
                <div class="col-sm-2">
                  <p class="form-control-static">{data}</p>
                </div>

                <label for="fcliente" class="col-sm-2 control-label">Total:</label>
                <div class="col-sm-2">
                  <p class="form-control-static">{total_venda}</p>
                </div>
              </div>

              <div class="form-group">
                <label for="fcliente" class="col-sm-2 control-label">Cliente:</label>
                <div class="col-sm-4">
                  <p class="form-control-static">{nome_cliente}</p>
                </div>

                <label for="fcliente" class="col-sm-2 control-label">CPF:</label>
                <div class="col-sm-4">
                  <p class="form-control-static">{cpf_cliente}</p>
                </div>
              </div>

              <div class="form-group">
                <label for="fcliente" class="col-sm-2 control-label">Vendedor:</label>
                <div class="col-sm-4">
                  <p class="form-control-static">{vendedor}</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </form>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
