<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msgOk = array();
$msgAviso = array();

$idvenda = $_SESSION['idvenda'];

$sql = "SELECT
  v.data, v.idcliente, v.idusuario,
  c.nome cliente, c.cpf,
  u.nome vendedor
FROM venda v
INNER JOIN cliente c On (c.idcliente = v.idcliente)
INNER JOIN usuario u On (u.idusuario = v.idusuario)
WHERE
  (v.idvenda = $idvenda)
  AND (v.situacao = '" . VENDA_ABERTA . "')
";

$q = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($q);

if(!$venda){
  javascriptAlertFim('Venda inexistente', 'vendas.php');
}

$data = strtotime($venda['data']);

$acao = 0;
if (isset($_POST['acao'])) {
  $acao = (int) $_POST['acao'];
}
elseif (isset($_GET['acao'])) {
  $acao = (int) $_GET['acao'];
}

// Acao incluir produto
if ($acao == 1) {
  $idproduto = (int) $_POST['idproduto'];
  $sql = "SELECT precocompra FROM produto WHERE idproduto = $idproduto";
  $q = mysqli_query($con,$sql);
  $produto = mysqli_fetch_assoc($q);
  if(!$produto){
    $msgAviso[] = 'Produto nao encontrado';
  }
  else{
    $precocompra = $produto['precocompra'];
    $qtd = (int) $_POST['qtd'];
    $precopago = (float) $_POST['preco'];
    $sql = "INSERT INTO vendaitem (idproduto,idvenda,preco,precopago, qtd)  VALUES($idproduto,$idvenda,$precocompra,$precopago,$qtd)";
    $q = mysqli_query($con, $sql);
    if(!$q){
      $msgAviso[] = 'Nao é possivel inserir este produto';
    }
    else{
      $msgOk[] ='Produto foi inserido';
    }
  }

}
// Remover produto da venda
elseif ($acao == 2) {
  $idproduto = (int) $_GET['idproduto'];

  $sql = "Delete From vendaitem WHERE
  (idvenda = $idvenda) And (idproduto = $idproduto)";
  $q = mysqli_query($con, $sql);
  $msgOk[] = 'Produto removido';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos da venda</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-shopping-cart"></i> Andamento da venda #<?php echo $idvenda; ?></h1>
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

      <form class="row" role="form" method="post" action="venda-produto.php">
        <div class="col-xs-12">

          <input type="hidden" name="acao" value="1">

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Adicionar produto</h3>
            </div>

            <div class="panel-body">

              <div class="container-fluid">
                <div class="row">

                  <div class="col-xs-12 col-sm-6 col-md-8">
                    <div class="form-group">
                      <label for="fidproduto">Produto</label>
                      <select id="fidproduto" name="idproduto" class="form-control" required>
                        <option value="">Selecione um produto</option>
                        <?php
                        $sql = "SELECT idproduto, produto, precovenda
                                FROM produto WHERE situacao = '" .
                                PRODUTO_ATIVO . "' ORDER BY produto ";
                        $q = mysqli_query($con,$sql);
                        while ($produto = mysqli_fetch_assoc($q)) {
                            
                        ?>
                        <option value="<?php echo $produto['idproduto']; ?>"><?php echo $produto['produto']; ?> (R$ <?php echo $produto['precovenda']; ?>)</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-3 col-md-2">
                    <div class="form-group">
                      <label for="fqtd">Quantidade</label>
                      <input type="number" class="form-control" id="fqtd" value="0" name="qtd" min="1" required>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-3 col-md-2">
                    <div class="form-group">
                      <label for="fpreco">Preço unitário</label>
                      <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="text" class="form-control" id="fpreco" name="preco" required>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="panel-footer">
              <button type="submit" class="btn btn-primary">Inserir</button>
              <button type="reset" class="btn btn-danger">Limpar</button>
            </div>
          </div>
        </div>
      </form>


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
                <?php 
                   $sql = "SELECT v.idproduto, v.precopago preco, v.qtd, p.produto FROM vendaitem v INNER JOIN produto p ON p.idproduto = v.idproduto WHERE v.idvenda = $idvenda";
                   $q = mysqli_query($con,$sql);

                   $total = 0;
                   while($produto = mysqli_fetch_assoc($q)){
                      $preco = (float) $produto['preco'];
                      $qtd = (int) $produto['qtd'];
                      $precoQtd = $preco * $qtd;

                      $total += $precoQtd;
                ?>

                <tr>
                  <td><?php echo $qtd; ?></td>
                  <td><?php echo $produto['produto'];  ?></td>
                  <td>R$ <?php echo number_format($preco, 2); ?></td>
                  <td>R$ <?php echo number_format($precoQtd, 2);?></td>
                  <td><a href="venda-produto.php?acao=2&idproduto=<?php echo $produto['idproduto']; ?>" title="Remover produto da venda"><i class="fa fa-times fa-lg"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th colspan="2">Total da venda</th>
                  <th>R$ <?php echo number_format($total, 2); ?></th>
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
                  <p class="form-control-static"><?php echo $idvenda; ?></p>
                </div>

                <label for="fcliente" class="col-sm-2 control-label">Data:</label>
                <div class="col-sm-2">
                  <p class="form-control-static"><?php echo date('d/m/Y H:i:s', $data); ?></p>
                </div>

                <label for="fcliente" class="col-sm-2 control-label">Total:</label>
                <div class="col-sm-2">
                  <p class="form-control-static">R$ <?php echo number_format($total, 2); ?></p>
                </div>
              </div>

              <div class="form-group">
                <label for="fcliente" class="col-sm-2 control-label">Cliente:</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><?php echo $venda['cliente']; ?></p>
                </div>

                <label for="fcliente" class="col-sm-2 control-label">CPF:</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><?php echo $venda['cpf']; ?></p>
                </div>
              </div>

              <div class="form-group">
                <label for="fcliente" class="col-sm-2 control-label">Vendedor:</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><?php echo $venda['vendedor']; ?></p>
                </div>
              </div>

            </div>

            <div class="panel-footer">
              <button type="submit" class="btn btn-success">Fechar venda</button>
            </div>
          </div>
        </div>
      </form>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
