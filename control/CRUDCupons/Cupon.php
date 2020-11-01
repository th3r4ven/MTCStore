<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 24/12/2019
 * Time: 10:25
 */

/**
 * Class Cupon
 *
 * This class contains all the code for the client CRUD on the admin dashboard;
 * The functions is named as what they do. ex.: cadastrarCupon($conexao) get the values from the variables to insert into the database table.
 *
 */

class Cupon{

    private $cuponID;
    private $codigo_cupon;
    private $porcentagem_desconto;

    /**
     * @return mixed
     */
    public function getCuponID()
    {
        return $this->cuponID;
    }

    /**
     * @param mixed $cuponID
     */
    public function setCuponID($cuponID): void
    {
        $this->cuponID = $cuponID;
    }

    /**
     * @return mixed
     */
    public function getCodigoCupon()
    {
        return $this->codigo_cupon;
    }

    /**
     * @param mixed $codigo_cupon
     */
    public function setCodigoCupon($codigo_cupon): void
    {
        $this->codigo_cupon = $codigo_cupon;
    }

    /**
     * @return mixed
     */
    public function getPorcentagemDesconto()
    {
        return $this->porcentagem_desconto;
    }

    /**
     * @param mixed $porcentagem_desconto
     */
    public function setPorcentagemDesconto($porcentagem_desconto): void
    {
        $this->porcentagem_desconto = $porcentagem_desconto;
    }

    /**
     * @param $conexao
     * @return string
     */
    public function cadastrarCupon($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCupon/INSERT_Cupon.php';
        $cadastrar = new INSERT_Cupon();
        $cadastrar->conexao = $conexao;
        $resultado = $cadastrar->cadastrar_Cupon($this->getCodigoCupon(), $this->getPorcentagemDesconto());

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
    public function deletarCupon($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCupon/DELETE_Cupon.php';
        $deletar = new DELETE_Cupon();
        $deletar->conexao = $conexao;
        $resultado = $deletar->deletarCupon($this->cuponID);

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
    public function alterarCupon($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCupon/ALTER_Cupon.php';
        $alterar = new ALTER_Cupon();
        $alterar->conexao = $conexao;

        $resultado = $alterar->alterarCupon($this->cuponID, $this->codigo_cupon, $this->porcentagem_desconto);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

}