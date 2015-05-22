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
    const BD = 3000;

    private static $mensagens = array(
        0 => '',
        self::CATEGORIA_VAZIO => 'Informe uma categoria',
        self::CATEGORIA_INEXISTENTE => 'Codigo de categoria inexistente',
        self::CATEGORIA_EXISTENTE => 'Nome de categoria já existe',
        self::CATEGORIA_COM_POST => 'Esta categoria possui relacao com registros de Post',
        self::POST_VAZIO => 'Informe um titulo para o post',
        self::POST_TITULO_EXISTENTE => 'Titulo ja existe',
        self::POST_TEXTO_INSUFICIENTE => 'A quantidade minima de caracteres para este texto e de 50 caracteres',
        self::POST_INEXISTENTE => 'Post inexistente.',
        self::POST_TITULO_VAZIO => 'Titulo do post não pode ser vazio',
        self::BD => 'Exceção no banco de dados',
    );

    public static function getMensagem($erro) {
        return self::$mensagens[$erro];
    }

}
