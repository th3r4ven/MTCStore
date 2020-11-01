<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 24/01/2020
 * Time: 14:46
 */

class uniqueProd{

    public $conexao;

    public function selecionarProd($id){

        $query = "SELECT p.id, p.titulo, p.descricaoBreve, p.descricaoProd, p.preco, p.preco_promo, p.estoque, p.sku_ean, p.marca, p.imagens, v.nome, cat.descricao, sc.subdescricao FROM m4th_pr0dut05 p INNER JOIN m4th_v4r14c40 v ON v.id = p.id_variacao INNER JOIN m4th_c4t3g0r145 cat ON cat.id = p.id_categoria INNER JOIN m4th_5ubc4t3g0r145 sc ON sc.id = p.id_sub_categoria WHERE p.id = $id LIMIT 1";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}