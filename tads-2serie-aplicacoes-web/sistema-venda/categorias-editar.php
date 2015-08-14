<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

if (isset($_POST['idcategoria'])) {
  $idcategoria = (int) $_POST['idcategoria'];
}
else {
  $idcategoria = (int) $_GET['idcategoria'];
}

$sql = "SELECT categoria, situacao
FROM categoria
WHERE idcategoria=$idcategoria";

$resultado = mysqli_query($con, $sql);
$registro = mysqli_fetch_assoc($resultado);

if (!$registro) {
  javascriptAlertFim('Categoria inexistente.', 'categorias.php');
}

if ($_POST) {
  $categoria = $_POST['categoria'];

  if (isset($_POST['ativo'])) {
    $situacao = CATEGORIA_ATIVO;
  }
  else {
    $situacao = CATEGORIA_INATIVO;
  }

  $sql = "SELECT COUNT(idcategoria) cont
  FROM categoria
  WHERE (categoria = '$categoria') And (idcategoria != $idcategoria)";
  $r = mysqli_query($con, $sql);
  $contador = mysqli_fetch_assoc($r);
  if ($contador['cont'] > 0) {
    $msg[] = 'O nome já existe para outra categoria. Escolha outro nome.';
  }

  if (!$msg) {
    $sql = "Update categoria Set
    categoria = '$categoria', situacao = '$situacao'
    Where idcategoria = $idcategoria
    ";

    mysqli_query($con, $sql);

    javascriptAlertFim('Registro salvo', 'categorias.php');
  }
}
else {
  $categoria = $registro['categoria'];
  $situacao = $registro['situacao'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar categoria</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-cubes"></i> Editar categoria #<?php echo $idcategoria; ?></h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="categorias-editar.php">
        <div class="col-xs-12">
          
          <input type="hidden" name="idcategoria" value="<?php echo $idcategoria; ?>">

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="fcategoria">Categoria</label>
                <input type="text" class="form-control" id="fcategoria" name="categoria" placeholder="Nome da categoria" value="<?php echo $categoria; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="checkbox">
                <label for="fativo">
                  <input type="checkbox" name="ativo" id="fativo"
                  <?php if ($situacao == CATEGORIA_ATIVO) { ?> checked<?php } ?>
                  > Categoria ativa
                </label>
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