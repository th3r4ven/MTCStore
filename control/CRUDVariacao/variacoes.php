<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 10:52
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDVariacao/Variacao.php';
$variacao = new Variacao();

function unsetVars(){
    unset($_POST['cadastro']);
    unset($_POST['excluir']);
    unset($_POST['alterar']);
    unset($_POST['listar']);
}

if(isset($_POST['cadastro']) && $_POST['cadastro'] != null){
    unsetVars();

    $variacao->setNome($_POST['nomeVariacao']);
    $variacao->setTipo($_POST['tipoVariacao']);

    $conexao = conexao::conect();
    $resultado = $variacao->cadastrarVariacao($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['excluir']) && $_POST['excluir'] != null){
    unsetVars();

    $variacao->setId($_POST['idVariacao']);

    $conexao = conexao::conect();
    $resultado = $variacao->deleterVariacao($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['alterar']) && $_POST['alterar'] != null){
    unsetVars();

    $variacao->setId($_POST['idVariacao']);
    $variacao->setNome($_POST['nomeVariacao']);
    $variacao->setTipo($_POST['tipoVariacao']);

    $conexao = conexao::conect();
    $resultado = $variacao->alterarVariacao($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['listar']) && $_POST['listar'] != null){
    unsetVars();

    $conexao = conexao::conect();
    $resultado = $variacao->listarTodasVariacao($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        return $resultado;
    }

}else{
    echo "Impossivel de realizar qualquer operação";
}