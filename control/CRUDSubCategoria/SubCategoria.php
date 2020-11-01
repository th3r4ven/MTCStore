<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 15:55
 */

Class SubCategoria{

    private $id;
    private $descricao;
    private $descricao_categoria_pai;

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
    public function setId($id): void
    {
        $this->id = $id;
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
    public function setDescricao($descricao): void
    {
        $this->descricao = urlencode($descricao);
    }

    /**
     * @return mixed
     */
    public function getDescricaoCategoriaPai()
    {
        $this->descricao_categoria_pai = urldecode($this->descricao_categoria_pai);
        return $this->descricao_categoria_pai;
    }

    /**
     * @param mixed $descricao_categoria_pai
     */
    public function setDescricaoCategoriaPai($descricao_categoria_pai): void
    {
        $this->descricao_categoria_pai = urlencode($descricao_categoria_pai);
    }

    public function cadastrarSubCategoria($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDSubCategoria/INSERT_Sub_Categoria.php';
        $cadastrar = new INSERT_Sub_Categoria();
        $cadastrar->conexao = $conexao;

        $resultado = $cadastrar->cadSubCategoria($this->descricao, $this->descricao_categoria_pai);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }

    }

    public function deleterSubCategoria($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDSubCategoria/DELETE_Sub_Categoria.php';
        $deletar = new DELETE_Sub_Categoria();
        $deletar->conexao = $conexao;

        $resultado = $deletar->delSubCategoria($this->id);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    public function alterarSubCategoria($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDSubCategoria/ALTER_Sub_Categoria.php';
        $alterar = new ALTER_Sub_Categoria();
        $alterar->conexao = $conexao;

        $resultado = $alterar->alterSubCategoria($this->id, $this->descricao, $this->descricao_categoria_pai);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }

    }

    public function listarTodasSubCategorias($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDSubCategoria/SELECT_Sub_Categoria.php';
        $select = new SELECT_Sub_Categoria();
        $select->conexao = $conexao;

        $resultado = $select->selecionarAllSubCategorias();

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }

    }

}