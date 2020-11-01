<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 12:13
 */

class SELECT_Categoria{

    public $conexao;

    public function selecionarAllCategorias(){

        $query = "SELECT * FROM m4th_c4t3g0r145 ORDER BY id ASC";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}