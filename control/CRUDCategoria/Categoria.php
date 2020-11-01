<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 11:53
 */

/**
 * Class Categoria.
 *
 * This class contains all the code for the category CRUD on the admin dashboard;
 * The functions is named as what they do. ex.: cadastrarCategoria($conexao) get the values from the variables to insert into the database table.
 *
 */

class Categoria{

    private $idCategoria;
    private $nomeCategoria;

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }

    /**
     * @return mixed
     */
    public function getNomeCategoria()
    {
        $this->nomeCategoria = urldecode($this->nomeCategoria);
        return $this->nomeCategoria;
    }

    /**
     * @param mixed $nomeCategoria
     */
    public function setNomeCategoria($nomeCategoria): void
    {
        $this->nomeCategoria = urlencode($nomeCategoria);
    }

    /**
     * @param $conexao
     * @return string
     */
    public function cadastrarCategoria($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCategoria/INSERT_Categoria.php';
        $cadastrar = new INSERT_Categoria();
        $cadastrar->conexao = $conexao;

        $resultado = $cadastrar->cadCategoria($this->nomeCategoria);

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
    public function deleterCategoria($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCategoria/DELETE_Categoria.php';
        $deletar = new DELETE_Categoria();
        $deletar->conexao = $conexao;

        $resultado = $deletar->delCategoria($this->idCategoria);

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
    public function alterarCategoria($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCategoria/ALTER_Categoria.php';
        $alterar = new ALTER_Categoria();
        $alterar->conexao = $conexao;

        $resultado = $alterar->alterCategoria($this->idCategoria, $this->nomeCategoria);

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
    public function listarTodasCategorias($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCategoria/SELECT_Categoria.php';
        $select = new SELECT_Categoria();
        $select->conexao = $conexao;

        $resultado = $select->selecionarAllCategorias();

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }

    }

}