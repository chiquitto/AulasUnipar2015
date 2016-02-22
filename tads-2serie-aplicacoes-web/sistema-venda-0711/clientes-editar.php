<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

if (isset($_POST['idcliente'])) {
  $idcliente = (int) $_POST['idcliente'];
}
else {
  $idcliente = (int) $_GET['idcliente'];
}

$sql = "Select
    idcliente, nome, email, situacao, idcidade, cpf
From cliente
WHERE idcliente=$idcliente";

$resultado = mysqli_query($con, $sql);
$registro = mysqli_fetch_assoc($resultado);

if (!$registro) {
  javascriptAlertFim('Cliente inexistente.', 'clientes.php');
}

if ($_POST) {
  $nome = $_POST['cliente'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $idcidade = $_POST['cidade'];

  if (isset($_POST['ativo'])) {
    $situacao = CLIENTE_ATIVO;
  }
  else {
    $situacao = CLIENTE_INATIVO;
  }

  if (!$msg) {
    $sql = "Update cliente Set
    nome = '$nome',
    email = '$email',
    idcidade = '$idcidade',
    cpf = '$cpf',
    situacao = '$situacao'
    Where idcliente = $idcliente
    ";

    mysqli_query($con, $sql);

    javascriptAlertFim('Registro salvo', 'clientes.php');
  }
}
else {
  $nome = $registro['nome'];
  $email = $registro['email'];
  $cpf = $registro['cpf'];
  $idcidade = $registro['idcidade'];
  $situacao = $registro['situacao'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar cliente</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-heart"></i> Editar cliente #<?php echo $idcliente; ?></h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="clientes-editar.php">
        <div class="col-xs-12">
          
          <input type="hidden" name="idcliente" value="<?php echo $idcliente; ?>">

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcliente">Cliente</label>
                <input type="text" class="form-control" id="fcliente" name="cliente" placeholder="Nome completo" value="<?php echo $nome; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="femail">Email</label>
                <input type="text" class="form-control" id="femail" name="email" value="<?php echo $email; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcpf">CPF</label>
                <input type="text" class="form-control" id="fcpf" name="cpf" placeholder="Somente números" maxlength="11" value="<?php echo $cpf; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcidade">Cidade</label>
                <select class="form-control" id="fcidade" name="cidade">
                  <option value="0">Selecione uma cidade</option>
                  <?php $sql = "Select idcidade, cidade, uf From cidade Order By cidade";
                        $q = mysqli_query($con, $sql);
                        while($cidade = mysqli_fetch_assoc($q)){
                        ?>        
                  <option value="<?php echo $cidade['idcidade'];?>"
                    <?php if($idcidade == $cidade['idcidade']){ ?> selected <?php } ?>
                    ><?php echo $cidade['cidade'];?>/<?php echo $cidade['uf'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="checkbox">
                <label for="fativo">
                  <input type="checkbox" name="ativo" id="fativo"
                  <?php if ($situacao == CLIENTE_ATIVO) { ?> checked<?php } ?>
                  > Cliente ativo
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