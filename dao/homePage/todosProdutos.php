<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/01/2020
 * Time: 16:42
 */

class todosProdutos{

    public $conexao;

    public function recentes(){

        $query = "SELECT id, titulo, preco, preco_promo, imagens FROM m4th_pr0dut05 ORDER BY id DESC LIMIT 4";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function populares(){

        $query = "SELECT id, titulo, preco, preco_promo, imagens FROM m4th_pr0dut05 WHERE destaque = 1 ORDER BY rand() LIMIT 4";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }
    }

    public function semana(){

        $query = "SELECT id, titulo, preco, preco_promo, imagens FROM m4th_pr0dut05 ORDER BY rand() LIMIT 9";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function unique($id){

        $query = "SELECT id, titulo, preco, preco_promo, imagens FROM m4th_pr0dut05 WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}