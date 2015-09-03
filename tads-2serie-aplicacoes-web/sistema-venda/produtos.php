<?php
require './protege.php';
require './config.php';
require './lib/conexao.php';
require './lib/funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-headphones"></i> Produtos</h1>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Produtos</h3>
            </div>

            <?php
            $idcategoria = 0;
            $q = '';

            if (isset($_GET['idcategoria'])) {
              $idcategoria = (int) $_GET['idcategoria'];
            }
            if (isset($_GET['q'])) {
              $q = trim($_GET['q']);
            }
            ?>
            <form class="panel-body form-inline" role="form" method="get" action="">
              <div class="form-group">
                <label class="sr-only" for="fq">Pesquisa</label>
                <select class="form-control" name="idcategoria">
                  <option value="0">--</option>
                  <?php
                  $sql = "SELECT idcategoria, categoria FROM categoria order by categoria";
                  $consulta = mysqli_query($con, $sql);
                  while( $categoria = mysqli_fetch_assoc($consulta)){
                    ?>
                    <option value="<?php echo $categoria['idcategoria'];?>"
                    <?php if($idcategoria == $categoria['idcategoria']){ ?> selected <?php } ?>
                    ><?php echo $categoria['categoria'];?></option>
                  <?php } ?>
                </select>
                <input type="search" class="form-control" id="fq" name="q" placeholder="Pesquisa" value="<?php echo $q; ?>">
              </div>
              <button type="submit" class="btn btn-default">Pesquisar</button>
            </form>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th></th>
                  <th>Categoria</th>
                  <th>Produto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT
                p.idproduto, p.idcategoria,
                c.categoria,
                p.produto, p.situacao
                FROM produto p
                Inner Join categoria c On (c.idcategoria = p.idcategoria)
                ";

                $where = array();
                if ($idcategoria > 0) {
                  $where[] = "(p.idcategoria = $idcategoria)";
                }
                if ($q != '') {
                  $where[] = "(p.produto like '%$q%')";
                }
                if ($where) {
                  $sql .= ' Where ' . join(' And ', $where);
                }

                $consulta = mysqli_query($con, $sql);

                 while($linha = mysqli_fetch_assoc($consulta)) {
                ?>

                <tr>
                  <td><?php echo $linha['idproduto']; ?></td>
                  <td>
                    <?php if ($linha['situacao'] == PRODUTO_ATIVO) { ?>
                    <span class="label label-success">ativo</span>
                    <?php } elseif ($linha['situacao'] == PRODUTO_MANUTENCAO) { ?>
                    <span class="label label-info">manutenção</span>
                    <?php } else { ?>
                    <span class="label label-warning">inativo</span>
                    <?php } ?>
                  </td>
                  <td><?php echo $linha['categoria']; ?></td>
                  <td><?php echo $linha['produto']; ?></td>
                  <td>
                    <a href="produtos-editar.php?idproduto=<?php echo $linha['idproduto']; ?>" title="Editar"><i class="fa fa-edit fa-lg"></i></a>
                    <a href="produtos-apagar.php?idproduto=<?php echo $linha['idproduto']; ?>" title="Remover"><i class="fa fa-times fa-lg"></i></a>
                  </td>
                </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
