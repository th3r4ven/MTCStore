<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 12:00
 */

class DELETE_Categoria{

    public $conexao;

    public function delCategoria($id){

        $query = "DELETE FROM m4th_c4t3g0r145 WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}