<!DOCTYPE html>
<html>

    <head>
        <title>Usuarios</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/pagina.css">

        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/pagina.js" type="text/javascript"></script>
    </head>

    <body>

        <div id="loading">
            <div id="loadingInner">
                <img src="img/ajax-loader.gif">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Usuários do Github</h1>
                </div>
            </div>

            <form class="panel panel-default" id="frm1">
                <div class="panel-heading">Pesquisar usuário</div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Usuário:</label>
                                <input type="text" class="form-control" id="frm1q">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit">Pesquisar</button>
                </div>
            </form>

            <form class="panel panel-default" id="frm2">
                <div class="panel-heading">Selecionar usuário</div>
                <div class="panel-body">

                    <!-- repetir -->
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object img-rounded" src="https://avatars.githubusercontent.com/u/2262702?v=3" alt="Chiquitto">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Alisson Chiquitto</h4>

                            <a class="btn btn-primary verRepositorios" data-user="chiquitto">Repositórios</a>
                        </div>
                    </div>
                    <!-- /repetir -->

                </div>

            </form>

            <form class="panel panel-default" id="frm3">
                <div class="panel-heading">Repositórios</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>descrição</th>
                            <th></th>
                        <tr>
                    </thead>

                    <tbody>
            
                    </tbody>
                </table>

            </form>

        </div>

    </body>
</html>