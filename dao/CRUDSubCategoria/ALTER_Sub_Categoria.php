<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 12:06
 */

class ALTER_Sub_Categoria{

    public $conexao;

    public function alterSubCategoria($id, $descricao, $descricao_categoria_pai){

        $query = "UPDATE m4th_5ubc4t3g0r145 SET subdescricao = '$descricao', id_categoria_pai = (SELECT cat.id FROM m4th_c4t3g0r145 cat WHERE cat.descricao = '$descricao_categoria_pai') WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}