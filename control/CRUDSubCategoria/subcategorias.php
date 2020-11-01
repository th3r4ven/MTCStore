<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 15:56
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDSubCategoria/SubCategoria.php';
$sub = new SubCategoria();

function unsetVars1(){
    unset($_POST['cadastro']);
    unset($_POST['excluir']);
    unset($_POST['alterar']);
    unset($_POST['listar']);
}

if(isset($_POST['cadastro']) && $_POST['cadastro'] != null){
    unsetVars1();

    $sub->setDescricao($_POST['descricaoSubCategoria']);
    $sub->setDescricaoCategoriaPai($_POST['descricaoCategoria']);

    $conexao = conexao::conect();
    $resultado = $sub->cadastrarSubCategoria($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['excluir']) && $_POST['excluir'] != null){
    unsetVars1();

    $sub->setId($_POST['idSubCategoria']);

    $conexao = conexao::conect();
    $resultado = $sub->deleterSubCategoria($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['alterar']) && $_POST['alterar'] != null){
    unsetVars1();

    $sub->setId($_POST['idSubCategoria']);
    $sub->setDescricao($_POST['descricaoSubCategoria']);
    $sub->setDescricaoCategoriaPai($_POST['descricaoCategoria']);

    $conexao = conexao::conect();
    $resultado = $sub->alterarSubCategoria($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['listar']) && $_POST['listar'] != null){
    unsetVars1();

    $conexao = conexao::conect();
    $resultado = $sub->listarTodasSubCategorias($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        return '0';
    }else{
        return $resultado;
    }

}else{echo "Impossivel realizar qualquer operação";}