<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 09/12/2019
 * Time: 11:23
 */

class showProfile{


    public $conexao;
    public function personalProfile($id){

        $query = "SELECT * FROM M4tH_Usu4r105 WHERE id = $id ";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado)){
            return $resultado;
        }else{
            return '0';
        }

    }


    public function allProfiles(){

    }

}