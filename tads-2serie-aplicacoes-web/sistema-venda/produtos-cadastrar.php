<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

$idcategoria = 0;
$produto = '';
$precocompra = 0;
$precovenda = 0;
$saldo = 0;

if ($_POST) {
  $idcategoria = 1;
  $produto = $_POST['produto'];
  $precocompra = (float) $_POST['precocompra'];
  $precovenda = (float) $_POST['precovenda'];
  $saldo = (int) $_POST['saldo'];
  $situacao = PRODUTO_ATIVO;

  if ($produto == '') {
    $msg[] = 'Informe o nome do produto';
  }
  if ($precocompra <= 0) {
    $msg[] = 'Preço de compra deve ser maior que 0.0';
  }
  if ($precovenda < $precocompra) {
    $msg[] = 'Preço de venda deve ser maior que preço de compra';
  }
  if ($saldo < 0) {
    $msg[] = 'Saldo deve ser no mínimo zero';
  }

  if (!$msg) {
    $sql = "INSERT INTO produto
      (produto, precocompra, precovenda, situacao, idcategoria, saldo)
      VALUES
      ('$produto', $precocompra, $precovenda, '$situacao', $idcategoria, $saldo)";

    $insert = mysqli_query($con, $sql);
    if (!$insert) {
      $msg[] = 'Falha para inserir o produto';
      $msg[] = mysqli_error($con);
      $msg[] = $sql;
    }
    else {
      javascriptAlertFim('Produto cadastrado', 'produtos.php');
    }
  }
}
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
                <input type="text" class="form-control" id="fproduto" name="produto" placeholder="Nome do produto" value="<?php echo $produto; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fprecocompra">Preço de compra</label>
                <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" id="fprecocompra" name="precocompra" value="<?php echo $precocompra; ?>">
                </div>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label for="fprecovenda">Preço de venda</label>
                <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" id="fprecovenda" name="precovenda" value="<?php echo $precovenda; ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fsaldo">Saldo</label>
                <input type="number" class="form-control" id="fsaldo" name="saldo" value="<?php echo $saldo; ?>">
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