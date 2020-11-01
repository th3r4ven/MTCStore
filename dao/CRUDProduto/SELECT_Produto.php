<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 27/12/2019
 * Time: 11:07
 */

class SELECT_Produto{

    public $conexao;

    public function listarProdutos(){

        $query = "SELECT p.id, p.titulo, p.preco, p.preco_promo, p.destaque, p.sku_ean, p.marca, p.entrega FROM m4th_pr0dut05 p ORDER BY p.id ASC";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }
    }

    public function searchProduto($busca){

        $query = "SELECT * FROM m4th_pr0dut05 WHERE titulo LIKE '%$busca%' OR descricaoProd LIKE '%$busca%' OR descricaoBreve LIKE '%$busca%' OR id LIKE '%$busca%' OR marca LIKE '%$busca%' OR sku_ean LIKE '%$busca%'";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }
    }

    public function selectUniqueProduto($id){

        $query = "SELECT p.id, p.titulo, p.descricaoBreve, p.descricaoProd, p.preco, p.preco_promo, p.estoque, p.cupom, p.destaque, p.sku_ean, p.marca, p.medidas, p.imagens, p.entrega, v.nome, cat.descricao, sc.subdescricao FROM m4th_pr0dut05 p INNER JOIN m4th_v4r14c40 v ON v.id = p.id_variacao INNER JOIN m4th_c4t3g0r145 cat ON cat.id = p.id_categoria INNER JOIN m4th_5ubc4t3g0r145 sc ON sc.id = p.id_sub_categoria WHERE p.id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function selectImagens($id){

        $query = "SELECT imagens FROM m4th_pr0dut05 WHERE id = $id";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }
    }

}