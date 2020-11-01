<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 13:47
 */

class INSERT_Variacao{

    public $conexao;

    public function cadVariacao($descricao, $tipos){

        $query = "INSERT INTO m4th_v4r14c40 (nome, tipos) VALUES ('$descricao', '$tipos')";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }
}