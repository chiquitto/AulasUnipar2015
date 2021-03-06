<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();
  
$nome ='';
$email ='';

if($_POST){

  $nome = $_POST['usuario'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $senha2 = $_POST['senha2'];

  if(strlen($nome) < 12){
    $msg[] = 'Informe um nome completo';
  }
  if($email == ''){
    $msg[] = 'Informe o email';
  }
  
  $sql = "SELECT COUNT(email) contador FROM usuario WHERE email = '$email' ";
  $r = mysqli_query($con, $sql);
  $m = mysqli_fetch_assoc($r);

  if($m['contador'] >= 1){
    $msg[] = 'Este email ja existe';
  }
  if($senha <> $senha2){
    $msg[] = 'Senhas precisam ser iguais';
  }
  if(strlen($senha) < 6){
    $msg[] = 'Senha deve ter no minimo 6 caracteres';
  }

  // $_FILES
  // print_r($_FILES);exit;
  $pedacos = explode('.', $_FILES['foto']['name']);
  $ext = strtolower(end($pedacos));
  if ($ext != 'jpg') {
    $msg[] = 'A foto deve ter a extensão JPG';
  }

  // Validar situacao do upload
  if ($_FILES['foto']['error'] > 0) {
    $msg[] = 'Erro no upload da foto';
  }

  // Limitar tamanho do arquivo em 500kb
  $tamMaximo = 1024 * 500;
  if ($_FILES['foto']['size'] > $tamMaximo) {
    $msg[] = 'O tamanho máximo da foto é de 500kb';
  }

  if(!$msg){
    $senha = senha($senha);

    $sql = "INSERT INTO usuario
    (nome, email, senha, situacao)
    VALUES
    ('$nome','$email', '$senha','". USUARIO_ATIVO . "')";

    $r = mysqli_query($con, $sql);
    if(!$r){
      $msg[] = 'Falha no Cadastro';
      $msg[] = mysqli_error($con);
    }
    else{
      $idusuario = mysqli_insert_id($con);
      $foto = DIRETORIO . "/fotos/usuario$idusuario.jpg";
      copy($_FILES['foto']['tmp_name'], $foto);

      $fotoP = DIRETORIO . "/fotos/usuariop$idusuario.jpg";
      redimensionarFigura($foto, $fotoP, 200, 200);

      javascriptAlertFim('Registro salvo', 'usuarios.php');
    }
  }
}
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

      <form class="row" role="form" method="post" action="usuarios-cadastrar.php" enctype="multipart/form-data">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="fusuario">Nome</label>
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

          Foto: <input type="file" name="foto">

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
