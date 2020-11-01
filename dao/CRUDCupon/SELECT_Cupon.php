<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/12/2019
 * Time: 16:57
 */

class SELECT_Cupon{


    public $conexao;


    public function ListCupons(){

        $query = "SELECT * FROM m4th_cup0n5 ORDER BY id ASC";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}