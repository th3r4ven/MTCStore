<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 13:47
 */

class SELECT_Variacao{

    public $conexao;

    public function selecionarAllVaricoes(){

        $query = "SELECT * FROM m4th_v4r14c40 ORDER BY id ASC";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}