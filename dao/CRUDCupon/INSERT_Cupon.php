<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/12/2019
 * Time: 16:57
 */

class INSERT_Cupon{

    public $conexao;


    public function cadastrar_Cupon($codigo_cupon, $porcentagem_desconto){

        $query = "INSERT INTO m4th_cup0n5 (codigo_cupon, porcentagem_desconto) VALUES ('$codigo_cupon', $porcentagem_desconto)";


        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }
    }
}