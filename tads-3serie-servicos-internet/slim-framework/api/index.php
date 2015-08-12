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

$app->run();
sleep(1);
