<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 08/12/2019
 * Time: 19:06
 */

class listUser{


    public $conexao;


    function ListarUsers(){

        $query = "SELECT * FROM M4tH_Usu4r105 ORDER BY id ASC";

        $resultado = mysqli_query($this->conexao , $query);

        if($resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }





    }

}