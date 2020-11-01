<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 08/12/2019
 * Time: 15:28
 */


class INSERT_ADM{


    public $conexao;

    public function InsertUser($username, $email, $senha, $user_type){

        $query = "INSERT INTO M4tH_Usu4r105 (username, email, senha, user_type) VALUES ('$username', '$email', '$senha', '$user_type')";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }
}