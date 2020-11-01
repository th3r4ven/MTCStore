<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 28/01/2020
 * Time: 11:56
 */

class allProdStore{

    public $conexao;


    public function allProdutos(){


        $query = "SELECT id, titulo, preco, preco_promo, imagens FROM m4th_pr0dut05 ORDER BY rand()";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }
    public function allCategorias(){

        $query = "SELECT id, descricao FROM m4th_c4t3g0r145";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function allSubCategoria($categoria){

        $query = "SELECT sub.id, sub.subdescricao FROM m4th_5ubc4t3g0r145 as sub WHERE sub.id_categoria_pai = (SELECT cat.id FROM m4th_c4t3g0r145 as cat WHERE cat.descricao = '$categoria')";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function countProdCategoria($descricao){

        $query = "SELECT COUNT(*) FROM m4th_pr0dut05 as p WHERE p.id_categoria = (SELECT c.id FROM m4th_c4t3g0r145 as c WHERE c.descricao = '$descricao')";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function countProdSubCategoria($descricao){

        $query = "SELECT COUNT(*) FROM m4th_pr0dut05 as p WHERE p.id_sub_categoria = (SELECT c.id FROM m4th_5ubc4t3g0r145 as c WHERE c.subdescricao = '$descricao')";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function searchProduto($busca){

        $query = "SELECT id, titulo, preco, preco_promo, imagens FROM m4th_pr0dut05 WHERE titulo LIKE '%$busca%' OR descricaoProd LIKE '%$busca%' OR descricaoBreve LIKE '%$busca%' OR id LIKE '%$busca%' OR marca LIKE '%$busca%' OR sku_ean LIKE '%$busca%'";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function categoriaProduto($categoria){

        $query = "SELECT p.id, p.titulo, p.preco, p.preco_promo, p.imagens FROM m4th_pr0dut05 as p WHERE p.id_categoria = $categoria ORDER BY rand()";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

    public function subCategoriaProduto($categoria, $subCategoria){

        $query = "SELECT p.id, p.titulo, p.preco, p.preco_promo, p.imagens FROM m4th_pr0dut05 as p WHERE p.id_categoria = $categoria AND p.id_sub_categoria = $subCategoria ";

        $resultado = mysqli_query($this->conexao, $query);

        if(isset($resultado) && $resultado != '0' || $resultado != null){
            return $resultado;
        }else{
            return '0';
        }

    }

}