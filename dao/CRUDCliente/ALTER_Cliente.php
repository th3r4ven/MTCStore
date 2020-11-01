<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 17/12/2019
 * Time: 11:00
 */

class ALTER_Cliente{


    public $conexao;


    public function Alterar_cliente($id, $nome, $email, $cpf, $data_nascimento, $telefone, $cep, $endereco, $numero, $estado, $bairro, $cidade){

        $query = "UPDATE m4th_cl13nt35 SET nome = '$nome', email = '$email', cpf = '$cpf', data_nascimento = '$data_nascimento', telefone = '$telefone', cep = '$cep', endereco = '$endereco', numero = '$numero', estado = '$estado', bairro = '$bairro', cidade = '$cidade' WHERE id = '$id'";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }


    public function Alterar_senha_cliente($senha, $id){

        $query = "UPDATE m4th_cl13nt35 SET senha = '$senha' WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}