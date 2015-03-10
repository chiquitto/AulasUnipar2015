<?php

// A fabrica produz 3 diferentes modelos: 1000cc, 1400cc e 2000cc
class Fabrica {
    
    public static function construirAutomovel($modelo) {
        switch ($modelo) {
            case '1000cc':
                echo 'Automovel de 1000cc construido <br>';
                return new Automovel1000cc();
                break;
            case '1400cc':
                echo 'Automovel de 1400cc construido <br>';
                return new Automovel1400cc();
                break;
            case '2000cc':
                echo 'Automovel de 2000cc construido <br>';
                return new Automovel2000cc();
                break;
            default :
                echo 'Nenhum modelo selecionado <br>';
                exit();
                break;
        }
    }
}