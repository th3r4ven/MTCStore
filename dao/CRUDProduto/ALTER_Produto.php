<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 27/12/2019
 * Time: 11:08
 */

class ALTER_Produto{

    public $conexao;

    public function alterarProduto($id, $titulo, $descricaoBreve, $descricao, $preco, $preco_promo, $estoque, $cupon, $destaque,  $sku_ean, $marca, $medidas, $imagens, $entrega, $variacao, $categoria, $sub_categoria){

        $query = "UPDATE m4th_pr0dut05 SET titulo = '$titulo', descricaoBreve = '$descricaoBreve', descricaoProd = '$descricao', preco = $preco, preco_promo = $preco_promo, estoque = $estoque, cupom = $cupon, destaque = $destaque, sku_ean = '$sku_ean', marca = '$marca', medidas = '$medidas', imagens = '$imagens', entrega = $entrega, id_variacao = (SELECT id FROM m4th_v4r14c40 WHERE nome = '$variacao'), id_categoria = (SELECT id FROM m4th_c4t3g0r145 WHERE descricao = '$categoria'), id_sub_categoria = (SELECT id FROM m4th_5ubc4t3g0r145 WHERE subdescricao = '$sub_categoria') WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }
    }

    public function alterarImagem($id, $imagem){

        $query = "UPDATE m4th_pr0dut05 SET imagens = '$imagem' WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return '1';
        }else{
            return '0';
        }
    }
}