<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/12/2019
 * Time: 16:57
 */

class DELETE_Cupon{


    public $conexao;

    public function deletarCupon($cuponID){

        $query = "DELETE FROM m4th_cup0n5 WHERE id = $cuponID";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }
    }
}