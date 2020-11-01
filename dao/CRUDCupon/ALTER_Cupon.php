<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/12/2019
 * Time: 16:56
 */


class ALTER_Cupon{


    public $conexao;

    public function alterarCupon($cupon_id, $cupon_code, $porcentagem_desconto){

        $query = "UPDATE m4th_cup0n5 SET codigo_cupon = '$cupon_code', porcentagem_desconto = $porcentagem_desconto WHERE id = $cupon_id";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}