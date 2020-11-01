<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 13:27
 */

class Variacao{

    private $id;
    private $nome;
    private $tipo;

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
    public function getNome()
    {
        $this->nome = urldecode($this->nome);
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = urlencode($nome);
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        $this->tipo = urldecode($this->tipo);
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = urlencode($tipo);
    }

    public function cadastrarVariacao($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDVariacao/INSERT_Variacao.php';
        $cadastrar = new INSERT_Variacao();
        $cadastrar->conexao = $conexao;

        $resultado = $cadastrar->cadVariacao($this->nome, $this->tipo);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }

    }

    public function deleterVariacao($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDVariacao/DELETE_Variacao.php';
        $deletar = new DELETE_Variacao();
        $deletar->conexao = $conexao;

        $resultado = $deletar->delVariacao($this->id);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    public function alterarVariacao($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDVariacao/ALTER_Variacao.php';
        $alterar = new ALTER_Variacao();
        $alterar->conexao = $conexao;

        $resultado = $alterar->alterVariacao($this->id, $this->nome, $this->tipo);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }

    }

    public function listarTodasVariacao($conexao){

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDVariacao/SELECT_Variacao.php';
        $select = new SELECT_Variacao();
        $select->conexao = $conexao;

        $resultado = $select->selecionarAllVaricoes();

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }

    }

}