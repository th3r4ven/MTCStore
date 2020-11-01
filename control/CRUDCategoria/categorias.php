<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 10:52
 */

/**
 * This file process all the data received via POST from the form on http://localhost/site/view/dashboard/produto/categoria.php.
 * first of all, calls for the class Categoria.
 *
 * The functions is divided by values on POST.
 * When the $_POST['listar'] is set this file return all the categoria that is stored in the database,
 * when another $_POST variable is set, this file act in different way.
 *
 * All the $_POST variables is named as what they do.
 *
 * The function insetVars() has in all those type of files. This function just "reset" the file to be used again.
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include  $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCategoria/Categoria.php';
$categoria = new Categoria();

function unsetVars2(){
    unset($_POST['cadastro']);
    unset($_POST['excluir']);
    unset($_POST['alterar']);
    unset($_POST['listar']);
}

if(isset($_POST['cadastro']) && $_POST['cadastro'] != null){
    unsetVars2();

    $categoria->setNomeCategoria($_POST['descCategoria']);

    $conexao = conexao::conect();
    $resultado = $categoria->cadastrarCategoria($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['excluir']) && $_POST['excluir'] != null){
    unsetVars2();

    $categoria->setIdCategoria($_POST['idCategoria']);

    $conexao = conexao::conect();
    $resultado = $categoria->deleterCategoria($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['alterar']) && $_POST['alterar'] != null){
    unsetVars2();

    $categoria->setIdCategoria($_POST['idCategoria']);
    $categoria->setNomeCategoria($_POST['descCategoria']);

    $conexao = conexao::conect();
    $resultado = $categoria->alterarCategoria($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['listar']) && $_POST['listar'] != null){
    unsetVars2();

    $conexao = conexao::conect();
    $resultado = $categoria->listarTodasCategorias($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        return $resultado;
    }

}else{
    echo "Impossivel de realizar qualquer operação";
}