<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 26/12/2019
 * Time: 17:04
 */

session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDUser/Administrador.php';
$adm = new Administrador();

function unsetVars(){
    unset($_POST['cadastro']);
    unset($_POST['excluir']);
    unset($_POST['alterar']);
}

if(isset($_POST['cadastro']) && $_POST['cadastro'] != null){
    unsetVars();

    $adm->setUsername($_POST['username']);
    $adm->setEmail($_POST['useremail']);
    $adm->setSenha($_POST['userkey']);
    $adm->setUserType($_POST['usertype']);

    $conexao = conexao::conect();
    $resultado = $adm->cadastrarADM($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif(isset($_POST['excluir']) && $_POST['excluir'] != null){
    unsetVars();

    $adm->setAdmID($_POST['userID']);

    $conexao = conexao::conect();
    $resultado = $adm->excluirADM($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif(isset($_POST['alterar']) && $_POST['alterar'] != null){
    unsetVars();

    $adm->setAdmID($_POST['userID']);
    $adm->setUsername($_POST['username']);
    $adm->setEmail($_POST['useremail']);

    $conexao = conexao::conect();
    $resultado = $adm->alterarADM($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        if(isset($_POST['profile']) && $_POST['profile'] == 1){
            $_SESSION['UserID'] = $adm->getAdmID();
            $_SESSION['Username'] = urldecode($adm->getUsername());
            $_SESSION['UserEmail'] = $adm->getEmail();
            $_SESSION['UserType'] = $adm->getUserType();
            unset($_POST['profile']);
        }
        echo '1';
    }

}elseif(isset($_POST['alterarSenha']) && $_POST['alterarSenha'] != null){
    unsetVars();

    $senha = md5(urlencode($_POST['userkey']));

    $adm->setAdmID($_POST['userID']);
    $adm->setSenha($senha);

    $conexao = conexao::conect();
    $resultado = $adm->alterarSenhaADM($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }
}