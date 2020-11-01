<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 17/12/2019
 * Time: 11:00
 */

class DELETE_Cliente{


    public $conexao;

    public function DeletarCliente($id){

        $query = "DELETE FROM m4th_cl13nt35 WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if($resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}