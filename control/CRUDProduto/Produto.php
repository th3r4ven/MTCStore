<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 27/12/2019
 * Time: 10:29
 */

/**
 * Class Produto
 *
 * This class contains all the code for the client CRUD on the admin dashboard;
 * The functions is named as what they do. ex.: cadastrarProduto($conexao) get the values from the variables to insert into the database table.
 *
 */

class Produto{

    private $id;
    private $titulo;
    private $descricaoBreve;
    private $descricao;
    private $preco;
    private $preco_promo;
    private $estoque;
    private $cupon;
    private $destaque;
    private $sku_ean;
    private $marca;
    private $medidas;
    private $imagens;
    private $entrega;
    private $variacao;
    private $categoria;
    private $sub_categoria;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        $this->titulo = urldecode($this->titulo);
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = urlencode($titulo);
    }

    /**
     * @return mixed
     */
    public function getDescricaoBreve()
    {
        $this->descricaoBreve = urldecode($this->descricaoBreve);
        return $this->descricaoBreve;
    }

    /**
     * @param mixed $descricaoBreve
     */
    public function setDescricaoBreve($descricaoBreve): void
    {
        $this->descricaoBreve = urlencode($descricaoBreve);
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        $this->descricao = urldecode($this->descricao);
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = urlencode($descricao);
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getPrecoPromo()
    {
        return $this->preco_promo;
    }

    /**
     * @param mixed $preco_promo
     */
    public function setPrecoPromo($preco_promo)
    {
        $this->preco_promo = $preco_promo;
    }

    /**
     * @return mixed
     */
    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * @param mixed $estoque
     */
    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    /**
     * @return mixed
     */
    public function getCupon()
    {
        return $this->cupon;
    }

    /**
     * @param mixed $cupon
     */
    public function setCupon($cupon)
    {
        $this->cupon = $cupon;
    }

    /**
     * @return mixed
     */
    public function getDestaque()
    {
        return $this->destaque;
    }

    /**
     * @param mixed $destaque
     */
    public function setDestaque($destaque): void
    {
        $this->destaque = $destaque;
    }

    /**
     * @return mixed
     */
    public function getSkuEan()
    {
        $this->sku_ean = urldecode($this->sku_ean);
        return $this->sku_ean;
    }

    /**
     * @param mixed $sku_ean
     */
    public function setSkuEan($sku_ean)
    {
        $this->sku_ean = urlencode($sku_ean);
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        $this->marca = urldecode($this->marca);
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = urlencode($marca);
    }

    /**
     * @return mixed
     */
    public function getMedidas()
    {
        $this->medidas = urldecode($this->medidas);
        return $this->medidas;
    }

    /**
     * @param mixed $medidas
     */
    public function setMedidas($medidas): void
    {
        $this->medidas = urlencode($medidas);
    }

    /**
     * @return mixed
     */
    public function getImagens()
    {
        $this->imagens = urldecode($this->imagens);
        return $this->imagens;
    }

    /**
     * @param mixed $imagens
     */
    public function setImagens($imagens)
    {
        $this->imagens = urlencode($imagens);
    }

    /**
     * @return mixed
     */
    public function getEntrega()
    {
        return $this->entrega;
    }

    /**
     * @param mixed $entrega
     */
    public function setEntrega($entrega)
    {
        $this->entrega = $entrega;
    }

    /**
     * @return mixed
     */
    public function getVariacao()
    {
        $this->variacao = urldecode($this->variacao);
        return $this->variacao;
    }

    /**
     * @param mixed $variacao
     */
    public function setVariacao($variacao)
    {
        $this->variacao = urlencode($variacao);
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        $this->categoria = urldecode($this->categoria);
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = urlencode($categoria);
    }

    /**
     * @return mixed
     */
    public function getSubCategoria()
    {
        $this->sub_categoria = urldecode($this->sub_categoria);
        return $this->sub_categoria;
    }

    /**
     * @param mixed $sub_categoria
     */
    public function setSubCategoria($sub_categoria)
    {
        $this->sub_categoria = urlencode($sub_categoria);
    }

    /**
     * @param $conexao
     * @return string
     */
    public function cadastrarProduto($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/INSERT_Produto.php';
        $cadastrar = new INSERT_produto();
        $cadastrar->conexao = $conexao;
        $resultado = $cadastrar->cadastrarProduto($this->titulo, $this->descricaoBreve, $this->descricao, $this->preco, $this->preco_promo, $this->estoque, $this->cupon, $this->destaque, $this->sku_ean, $this->marca, $this->medidas, $this->imagens, $this->entrega, $this->variacao, $this->categoria, $this->sub_categoria);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    /**
     * @param $conexao
     * @return string
     */
    public function excluirProduto($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/DELETE_Produto.php';
        $deletar = new DELETE_Produto();
        $deletar->conexao = $conexao;
        $resultado = $deletar->deleteProduto($this->getId());

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    /**
     * @param $conexao
     * @return string
     */
    public function obterImagens($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/SELECT_Produto.php';
        $imagem = new SELECT_Produto();
        $imagem->conexao = $conexao;
        $resultado = $imagem->selectImagens($this->id);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            foreach ($resultado as $img){
                return $img['imagens'];
            }
        }
    }


    /**
     * @param $conexao
     * @return string
     */
    public function alterarProduto($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/ALTER_Produto.php';
        $alterar = new ALTER_Produto();
        $alterar->conexao = $conexao;
        $resultado = $alterar->alterarProduto($this->id, $this->titulo, $this->descricaoBreve, $this->descricao, $this->preco, $this->preco_promo, $this->estoque, $this->cupon, $this->destaque, $this->sku_ean, $this->marca, $this->medidas, $this->imagens, $this->entrega, $this->variacao, $this->categoria, $this->sub_categoria);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    /**
     * @param $conexao
     * @return string
     */
    public function alterarImagens($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/ALTER_Produto.php';
        $alterar = new ALTER_Produto();

        $alterar->conexao = $conexao;
        $resultado = $alterar->alterarImagem($this->id, $this->imagens);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    /**
     * @param $conexao
     * @return bool|mysqli_result|string
     */
    public function listarProdutos($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/SELECT_Produto.php';
        $listar = new SELECT_Produto();
        $listar->conexao = $conexao;
        $resultado = $listar->listarProdutos();

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }
    }

    /**
     * @param $conexao
     * @param $busca
     * @return bool|mysqli_result|string
     */
    public function search_produto($conexao, $busca){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/SELECT_Produto.php';
        $listar = new SELECT_Produto();
        $listar->conexao = $conexao;
        $resultado = $listar->searchProduto($busca);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }
    }

    /**
     * @param $conexao
     * @return bool|mysqli_result|string
     */
    public function uniqueProduct($conexao){
        include  $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDProduto/SELECT_Produto.php';
        $unique = new SELECT_Produto();
        $unique->conexao = $conexao;
        $resultado = $unique->selectUniqueProduto($this->id);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }

    }


}