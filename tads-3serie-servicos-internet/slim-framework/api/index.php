<?php

require '../config.php';

require DIRETORIO_SLIM . '/Slim.php';

// \Slim\Slim::registerAutoloader();

function saidaJson(array $dados, $erro = 0) {
    $r = array(
        'erro' => $erro,
        'dados' => $dados
    );

    return json_encode($r);
}

$app = new \Slim\Slim();

$app->get('/', function() use ($app) {
    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(json_encode('Método não implementado'));
});

$app->get(
        '/estado', function () use ($app) {
    $con = Conexao::getInstance();

    $sql = 'Select * From uf';
    $ufQuery = $con->query($sql);
    $ufArray = $ufQuery->fetchAll(PDO::FETCH_ASSOC);

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(saidaJson($ufArray));
}
);

$app->get(
        '/estado/:iduf', function ($iduf) use ($app) {

    $con = Conexao::getInstance();
    $sql = 'SELECT iduf, uf FROM uf Where (iduf = :iduf)';

    $statement = $con->prepare($sql);
    $statement->bindValue(':iduf', $iduf, PDO::PARAM_STR);
    $statement->execute();

    $uf = $statement->fetch(PDO::FETCH_ASSOC);

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(saidaJson($uf));
}
);

$app->post('/estado', function () {
    $app = \Slim\Slim::getInstance();
    $app->response->setStatus(200);

    $iduf = $app->request->params('iduf');

    $sql = "Insert Into uf (iduf, uf) Values (:iduf, :uf)";

    $con = Conexao::getInstance();
    $statement = $con->prepare($sql);
    $statement->bindValue(':iduf', $iduf, PDO::PARAM_STR);
    $statement->bindValue(':uf', $app->request->params('uf'), PDO::PARAM_STR);
    $statement->execute();

    // $iduf = $con->lastInsertId();

    $app->response->headers->set('Content-Type', 'application/json');
    $app->response->write(saidaJson(array(
        'iduf' => $iduf,
    )));
});

$app->get('/cidade', function() use ($app) {
    $con = Conexao::getInstance();

    $sql = "SELECT idcidade, cidade, populacao, iduf FROM cidade";
    $cidades = $con->query($sql);

    $cidadesArray = $cidades->fetchAll(PDO::FETCH_ASSOC);

    $app->response->setStatus(200);
    $app->response->headers->set('content-type', 'application/json');
    $app->response->write(saidaJson($cidadesArray));
});

$app->get('/cidade/:idcidade', function($idcidade) use ($app) {
    $idcidade = (int) $idcidade;

    $sql = "Select idcidade, cidade, populacao, iduf
    From cidade
    Where (idcidade = $idcidade)";

    $con = Conexao::getInstance();
    $consulta = $con->query($sql);

    $cidade = $consulta->fetch(PDO::FETCH_ASSOC);

    $app->response->headers->set('content-type', 'application/json');
    if (!$cidade) {
        $app->response->setStatus(404);
    }
    else {
        $app->response->setStatus(200);
        $app->response->write(saidaJson($cidade));
    }
});

$app->get('/estado/cidade/:uf', function($uf) use ($app){
    $uf = strtoupper($uf);
    $con = Conexao::getInstance();
    $sql = "select idcidade, cidade, populacao from cidade where iduf = :uf";
    $prepare = $con->prepare($sql);
    $prepare->bindValue(':uf', $uf, PDO::PARAM_STR);
    $prepare->execute();
    $consulta = $prepare->fetchAll(PDO::FETCH_ASSOC);

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type',
    'application/json');
    $app->response->write(saidaJson($consulta));
});

$app->post('/cidade', function() use ($app) {
    $cidade = $app->request->params('cidade');
    $populacao = $app->request->params('populacao');
    $uf = $app->request->params('uf');
    $uf = strtoupper($uf);
    $populacao = (int) $populacao;

    $con = Conexao::getInstance();
    $sql = "Insert into cidade (cidade, populacao, iduf) values (:cidade,:populacao,:iduf)";
    $prepara = $con->prepare($sql);
    $prepara->bindValue(':cidade',$cidade);
    $prepara->bindValue(':populacao',$populacao);
    $prepara->bindValue(':iduf',$uf);
    $prepara->execute();

    $cod = $con->lastInsertId();
    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type',
    'application/json');
    $app->response->write(saidaJson(
      array('idcidade'=>$cod)
    ));
});

$app->post('/editarCidade', function () use ($app){
    $idcidade = (int) $app->request->params('idcidade');
    $populacao = (int) $app->request->params('populacao');

    $con = Conexao::getInstance();
    $sql = "update cidade set populacao = :populacao where idcidade = :idcidade";
    $prepara = $con->prepare($sql);
    $prepara->bindValue(':idcidade', $idcidade);
    $prepara->bindValue(':populacao', $populacao);
    $prepara->execute();

    $app->response->write(saidaJson(array(
        'idcidade'=> $idcidade)));

});

$app->run();
sleep(1);
