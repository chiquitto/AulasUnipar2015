<?php

class Erros {
    const CATEGORIA_VAZIO = 1000;
    const CATEGORIA_INEXISTENTE = 1001;
    const POST_VAZIO = 2000;
    
    private static $mensagens = array(
        0 => '',
        self::CATEGORIA_VAZIO => 'Informe uma categoria',
        self::CATEGORIA_INEXISTENTE => 'Codigo de categoria inexistente',
        self::POST_VAZIO => 'Informe um titulo para o post',
    );
    
    public static function getMensagem($erro) {
        return self::$mensagens[$erro];
    }
}