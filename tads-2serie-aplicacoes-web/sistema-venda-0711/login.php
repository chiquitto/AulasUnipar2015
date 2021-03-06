<?php

require './config.php';
require './lib/funcoes.php';

if ($_POST) {
  $email = $_POST['email'];
  $senha = senha($_POST['senha']);

  $sql = "Select idusuario, nome From usuario
  Where (email = '$email')
    And (senha = '$senha')
    And (situacao = '" . USUARIO_ATIVO . "')";

  require 'lib/conexao.php';
  $consulta = mysqli_query($con, $sql);
  $usuario = mysqli_fetch_assoc($consulta);

  if ($usuario) {
    session_start();
    $_SESSION['logado'] = 1;
    $_SESSION['idusuario'] = $usuario['idusuario'];
    $_SESSION['nome'] = $usuario['nome'];

    header('location:index.php');
    exit;
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TecInfo Unipar</title>

    <?php headCss(); ?>

    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
          }

          .container {
            max-width: 330px;
          }

          form { margin-bottom: 15px; }
    </style>
  </head>
  <body>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">

          <h2 class="form-signin-heading">Faça seu login</h2>

          <form class="form-signin" role="form" method="post" action="login.php">
            <div class="form-group">
              <label for="femail" class="sr-only">Email: </label>
              <input type="email" class="form-control" id="femail" name="email" placeholder="Endereço de e-mail">
            </div>

            <div class="form-group">
              <label for="fsenha" class="sr-only">Senha: </label>
              <input type="password" class="form-control" id="fsenha" name="senha" placeholder="Senha">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Fazer login</button>
          </form>

        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="alert alert-info" role="alert">
            <strong>Email/Senha padrão:</strong> admin@admin.com/unipar
          </div>
        </div>
      </div>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
