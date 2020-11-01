<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/12/2019
 * Time: 15:51
 */

/**
 * This file process all the data received via POST from the form on http://localhost/site/view/dashboard/usuarios/cupons.php.
 * first of all, calls for the class Cupon.
 *
 * The functions is divided by values on POST.
 * When the $_POST['listar'] is set this file return all the cupons that is stored in the database,
 * when another $_POST variable is set, this file act in different way.
 *
 * All the $_POST variables is named as what they do.
 *
 * The function insetVars() has in all those type of files. This function just "reset" the file to be used again.
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCupons/Cupon.php';
$cupon =  new Cupon();

function unsetVars(){
    unset($_POST['cadastro']);
    unset($_POST['excluir']);
    unset($_POST['alterar']);
}

if(isset($_POST['cadastro']) && $_POST['cadastro'] != null){
    unsetVars();

    $codigo_cupon = urlencode($_POST['codigoCupon']);
    $porcentagem_desconto = $_POST['porcentagemCupon'];

    $cupon->setCodigoCupon($codigo_cupon);
    $cupon->setPorcentagemDesconto($porcentagem_desconto);

    $conexao = conexao::conect();
    $resultado = $cupon->cadastrarCupon($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }


}elseif(isset($_POST['excluir']) && $_POST['excluir'] != null){
    unsetVars();

    $cuponID = urlencode($_POST['CuponID']);
    $cupon->setCuponID($cuponID);

    $conexao = conexao::conect();
    $resultado = $cupon->deletarCupon($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['alterar']) && $_POST['alterar'] != null){
    unsetVars();

    $cuponID = urlencode($_POST['CuponID']);
    $codigo_cupon = urlencode($_POST['codigoCupon']);
    $porcentagem_desconto = urlencode($_POST['porcentagemCupon']);

    $cupon->setCuponID($cuponID);
    $cupon->setCodigoCupon($codigo_cupon);
    $cupon->setPorcentagemDesconto($porcentagem_desconto);

    $conexao = conexao::conect();
    $resultado = $cupon->alterarCupon($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}


