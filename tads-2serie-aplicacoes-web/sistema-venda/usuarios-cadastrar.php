<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar usuário</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-user"></i> Cadastrar usuário</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="usuarios-cadastrar.php">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="fusuario">Usuário</label>
                <input type="text" class="form-control" id="fusuario" name="usuario" placeholder="Nome completo">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="femail">Email</label>
                <input type="email" class="form-control" id="femail" name="email">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fsenha">Senha</label>
                <input type="password" class="form-control" id="fsenha" name="senha">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fsenha2">Repita a senha</label>
                <input type="password" class="form-control" id="fsenha2" name="senha2">
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