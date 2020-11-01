<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 11:57
 */

class INSERT_Categoria{

    public $conexao;

    public function cadCategoria($descricao){

        $query = "INSERT INTO m4th_c4t3g0r145 (descricao) VALUES ('$descricao')";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }
}