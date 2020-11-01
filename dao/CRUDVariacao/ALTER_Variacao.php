<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 13:46
 */

class ALTER_Variacao{

    public $conexao;

    public function alterVariacao($id, $descricao, $tipos){

        $query = "UPDATE m4th_v4r14c40 SET nome = '$descricao', tipos = '$tipos' WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}