<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 17/12/2019
 * Time: 11:00
 */

class INSERT_Cliente{


    public $conexao;

    public function Inserir_cliente($nome, $email, $cpf, $data_nascimento, $telefone, $cep, $endereco, $numero, $estado, $bairro, $cidade, $senha){


        $query = "INSERT INTO m4th_cl13nt35(nome, email, cpf, data_nascimento, telefone, cep, endereco, numero, estado, bairro, cidade, senha) VALUES ('$nome', '$email', '$cpf', '$data_nascimento', '$telefone', '$cep', '$endereco', $numero, '$estado', '$bairro', '$cidade', '$senha')";

        $resultado = mysqli_query($this->conexao, $query);


        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }
}