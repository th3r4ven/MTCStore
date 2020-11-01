<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 27/12/2019
 * Time: 11:08
 */

class DELETE_Produto{

    public $conexao;

    public function deleteProduto($id){

        $query = "DELETE FROM m4th_pr0dut05   WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }
    }

}