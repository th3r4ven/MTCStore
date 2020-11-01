<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 08/12/2019
 * Time: 22:43
 */


class ALTER_ADM{


    public $conexao;

    public function AlterarUsuario($id, $username, $email){



        $query = "UPDATE M4tH_Usu4r105 SET  username = '$username', email = '$email' WHERE id = $id ";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){

            $query = "SELECT * FROM M4tH_Usu4r105 WHERE id = $id ";
            $resultado = mysqli_query($this->conexao, $query);
            return $resultado;
        }else{
            return '0';
        }

    }

    public function AlterarSenha($id, $senha){



        $query = "UPDATE M4tH_Usu4r105 SET senha = '$senha' WHERE id = $id ";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}