<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 17/12/2019
 * Time: 11:00
 */

class SELECT_Cliente{


    public $conexao;


    public function SelectCliente(){


        $query = "SELECT id, nome, email, cpf, cep, telefone FROM m4th_cl13nt35 ORDER BY id ASC";

        $resultado = mysqli_query($this->conexao, $query);


        if($resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }


    public function SelectUniqueCLiente($id){

        $query = "SELECT * FROM m4th_cl13nt35 WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }
    }

    public function searchCliente($busca, $busca64){

        $query = "SELECT * FROM m4th_cl13nt35 WHERE id LIKE '%$busca%' OR nome LIKE '%$busca%' OR email LIKE '%$busca64%' OR cpf LIKE '%$busca64%' OR cep LIKE '%$busca%' OR telefone LIKE '%$busca%'";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}