<?php

/**
 *
 * Abre a imagem $origem, altera a largura e altura e salva em $destino
 *
 * @param string $origem Local da imagem original
 * @param string $destino Local de destino da imagem redimensionada
 * @param int $largura Largura da imagem redimensionada
 * @param int $altura Altura da imagem redimensionada
 *
 */
function criaImg($origem, $destino, $largura, $altura){
        $imgorigem = imagecreatefromjpeg($origem);
        $w = imagesx($imgorigem);
        $h = imagesy($imgorigem);
        $imgdestino = imagecreatetruecolor($largura, $altura);
        imagecopyresampled($imgdestino, $imgorigem, 0, 0, 0, 0, $largura, $altura, $w, $h);
        imagejpeg($imgdestino, $destino, 80);
        imagedestroy($imgdestino);
}

define('PATH', realpath('.'));
criaimg(PATH . '/original2.jpg', PATH . '/destino.jpg', 500, 500);