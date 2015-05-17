<?php

class Erros {
    const CATEGORIA_VAZIO = 1000;
    const CATEGORIA_INEXISTENTE = 1001;
    const CATEGORIA_EXISTENTE = 1002;
    const CATEGORIA_COM_POST = 1003;
    const POST_VAZIO = 2000;
    const POST_TITULO_EXISTENTE = 2001;
    const POST_TEXTO_INSUFICIENTE = 2002;
    const POST_INEXISTENTE = 2003;
    const POST_TITULO_VAZIO = 2004;
    const BD_ERRO = 3000;
    
    
    private static $mensagens = array(
        0 => '',
        self::CATEGORIA_VAZIO => 'Informe uma categoria',
        self::CATEGORIA_INEXISTENTE => 'Codigo de categoria inexistente',
        self::CATEGORIA_COM_POST => 'Esta categoria possui relacao com registros de Post',
        self::POST_VAZIO => 'Informe um titulo para o post',
        self::BD => 'Exceção no banco de dados',
        self::POST_TITULO_EXISTENTE=> 'Titulo ja existe'
    );
    
    public static function getMensagem($erro) {
        return self::$mensagens[$erro];
    }
}