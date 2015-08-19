<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

if (isset($_POST['idusuario'])) {
  $idusuario = (int) $_POST['idusuario'];
}
else {
  $idusuario = (int) $_GET['idusuario'];
}


$sql = "select idusuario, nome, email, situacao from usuario where $idusuario = idusuario";
$consulta = mysqli_query($con, $sql);
$usuario = mysqli_fetch_assoc($consulta);

if (!$usuario) {
  javascriptAlertFim("Usuário inexistente", "usuarios.php");
}

if ($_POST) {
  $nome = $_POST['usuario'];
  $email = $_POST['email'];

  if (isset($_POST['ativo'])) {
    $situacao = USUARIO_ATIVO;
  } else {
    $situacao = USUARIO_INATIVO;
  }

  // Validacoes aqui

  $sql = "UPDATE usuario Set
  	nome = '$nome',
  	email = '$email',
  	situacao = '$situacao'
  Where (idusuario = $idusuario)";

  $resultado = mysqli_query($con, $sql);

  if (!$resultado) {
    $msg[] = 'Falha ao salvar!';
    $msg[] = mysqli_error($con);
  }
  else {
    javascriptAlertFim('Gravação efetuada!', 'usuarios.php');
  }

}
else {
  $nome = $usuario['nome'];
  $email = $usuario['email'];
  $situacao = $usuario['situacao'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar usuário</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-user"></i> Editar usuário #<?php echo $idusuario; ?></h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="usuarios-editar.php">
        <div class="col-xs-12">

          <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="fusuario">Usuário</label>
                <input type="text" class="form-control" id="fusuario" name="usuario" placeholder="Nome completo" value="<?php echo $nome ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="femail">Email</label>
                <input type="email" class="form-control" id="femail" name="email" value="<?php echo $email ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="checkbox">
                <label for="fativo">
                  <input type="checkbox" name="ativo" id="fativo" <?php    if ($situacao == USUARIO_ATIVO){ ?> checked <?php } ?>>
                   Usuário ativo
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
