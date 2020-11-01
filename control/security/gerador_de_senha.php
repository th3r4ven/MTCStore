<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 20/12/2019
 * Time: 00:36
 */

function Gerarsenha(){

    $caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $quantidadeCaracteres = strlen($caracteres);
    $quantidadeCaracteres --;
    $hash = null;

    for($x = 1; $x<= 12; $x++){
        $posicao = rand(0, $quantidadeCaracteres);

        $hash .= substr($caracteres, $posicao, 1);
    }

    return $hash;
}
