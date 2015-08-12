<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar cidade</title>

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/estilo.css">

  </head>
  <body>

    <div class="container">

      <div class="row">
        <div class="col-xs-12"><h1>Cadastrar cidade</h1></div>
      </div>

      <form class="panel panel-default" id="frm1">
        <div class="panel-heading">Dados da cidade</div>
        <div class="panel-body">

          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label>UF:</label>
                <select class="form-control" id="fiduf" name="iduf"></select>
              </div>
            </div>
            <div class="col-xs-8">
              <div class="form-group">
                <label>Cidade:</label>
                <input type="text" class="form-control" id="fcidade" name="cidade">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label>População:</label>
                <input type="number" class="form-control" id="fpopulacao" name="populacao">
                <p class="help-block">Número de habitantes na cidade</p>
              </div>
            </div>
          </div>

        </div>
        <div class="panel-footer">
          <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
      </form>

    </div>

    <?php include 'lib/loading.php'; ?>

    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="lib/cad-cidade.js" type="text/javascript"></script>

  </body>
</html>