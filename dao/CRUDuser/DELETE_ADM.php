<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 08/12/2019
 * Time: 22:59
 */


class DELETE_ADM{


    public $conexao;


    public function DeletarUsuario($id){


        $query = "DELETE FROM M4tH_Usu4r105 WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}
