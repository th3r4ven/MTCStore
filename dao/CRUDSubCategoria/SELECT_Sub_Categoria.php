<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 12:13
 */

class SELECT_Sub_Categoria{

    public $conexao;

    public function selecionarAllSubCategorias(){

        $query = "SELECT sub.id, sub.subdescricao, cat.descricao FROM m4th_5ubc4t3g0r145 sub, m4th_c4t3g0r145 cat WHERE sub.id_categoria_pai = cat.id ORDER BY id ASC";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}