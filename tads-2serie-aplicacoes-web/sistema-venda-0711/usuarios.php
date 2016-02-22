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
    <title>Usuários</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-cubes"></i> Usuários</h1>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Usuários</h3>
            </div>

            <?php
            $q = '';
            if (isset($_GET['q'])) {
              $q = trim($_GET['q']);
            }
            ?>
            <form class="panel-body form-inline" role="form" method="get" action="">
              <div class="form-group">
                <label class="sr-only" for="fq">Pesquisa</label>
                <input type="search" class="form-control" id="fq" name="q" placeholder="Pesquisa" value="<?php echo $q; ?>">
              </div>
              <button type="submit" class="btn btn-default">Pesquisar</button>
            </form>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th></th>
                  <th>Usuário</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "Select idusuario, nome, email, situacao From usuario";

                if ($q != '') {
                  $sql .= " Where ((nome like '%$q%') Or (email like '%$q%'))";
                }
                
                $consulta = mysqli_query($con, $sql);

                 while($linha = mysqli_fetch_assoc($consulta)) {
                ?>
                <tr>
                  <td><?php echo $linha['idusuario']; ?></td>
                  <td>
                    <?php if ($linha['situacao'] == CATEGORIA_ATIVO) { ?>
                    <span class="label label-success">ativo</span>
                    <?php } else { ?>
                    <span class="label label-warning">inativo</span>
                    <?php } ?>
                  </td>
                  <td><?php echo $linha['nome']; ?>&lt;<?php echo $linha['email']; ?>&gt;</td>
                  <td>
                    <a href="usuarios-editar.php?idusuario=<?php echo $linha['idusuario']; ?>" title="Editar"><i class="fa fa-edit fa-lg"></i></a>
                    <a href="usuarios-senha.php?idusuario=<?php echo $linha['idusuario']; ?>" title="Senha"><i class="fa fa-lock fa-lg"></i></a>
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