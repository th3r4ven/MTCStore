<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 12:06
 */

class ALTER_Categoria{

    public $conexao;

    public function alterCategoria($id, $descricao){

        $query = "UPDATE m4th_c4t3g0r145 SET descricao = '$descricao' WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}