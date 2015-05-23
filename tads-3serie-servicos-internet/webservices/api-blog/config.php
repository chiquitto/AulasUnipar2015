<?php

define('PATH', 'D:\chiquitto\3serie\webservices\api-blog');

define('TELAS', PATH . '/telas');
define('CLASSES', PATH . '/classes');

/**
 * Autoload de classes
 * Carrega automaticamente classes que estao no padrao PSR-0
 *
 * @link http://www.php-fig.org/psr/psr-0/pt-br/
 * @link https://github.com/php-fig/fig-standards/blob/master/accepted/pt-BR/PSR-0.md
 */
function __autoload($className) {
    $className = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require CLASSES . "/" . $fileName;
}

function saidaJson(array $dados, $erro = 0) {
    $r = array(
        'erro' => $erro,
        'erroMsg' => Erros::getMensagem($erro),
        'dados' => $dados
    );

    header('Content-Type: application/json');
    echo json_encode($r);
    exit;
}
