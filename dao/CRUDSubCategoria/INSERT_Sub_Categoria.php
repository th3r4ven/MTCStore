<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 11:57
 */

class INSERT_Sub_Categoria{

    public $conexao;

    public function cadSubCategoria($descricao, $descricao_pai){

        $query = "INSERT INTO m4th_5ubc4t3g0r145 (subdescricao, id_categoria_pai) VALUES ('$descricao', (SELECT cat.id FROM m4th_c4t3g0r145 cat WHERE cat.descricao = '$descricao_pai'))";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }
}