<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 27/12/2019
 * Time: 11:07
 */

class INSERT_produto{

    public $conexao;

    public function cadastrarProduto($titulo, $descricaoBreve, $descricao, $preco, $preco_promo, $estoque, $cupon, $destaque, $sku_ean, $marca, $medidas, $imagens, $entrega, $variacao, $categoria, $sub_categoria){

        $query = "INSERT INTO m4th_pr0dut05 (titulo, descricaoBreve, descricaoProd, preco, preco_promo, estoque, cupom, destaque, sku_ean, marca, medidas, imagens, entrega, id_variacao, id_categoria, id_sub_categoria) VALUES ('$titulo', '$descricaoBreve', '$descricao', $preco, $preco_promo, $estoque, $cupon, $destaque, '$sku_ean', '$marca', '$medidas', '$imagens', $entrega, (SELECT id FROM m4th_v4r14c40 WHERE nome = '$variacao'), (SELECT id FROM m4th_c4t3g0r145 WHERE descricao = '$categoria'), (SELECT id FROM m4th_5ubc4t3g0r145 WHERE subdescricao = '$sub_categoria'))";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }

    }

}