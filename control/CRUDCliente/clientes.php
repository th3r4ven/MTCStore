<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 26/12/2019
 * Time: 12:15
 */

/**
 * This file process all the data received via POST from the form on http://localhost/site/view/dashboard/usuarios/cadCli.php.
 * first of all, calls for the class Cliente.
 *
 * The functions is divided by values on POST.
 * When the $_POST['listar'] is set this file return all the clients that is stored in the database,
 * when another $_POST variable is set, this file act in different way.
 *
 * All the $_POST variables is named as what they do.
 *
 * The function insetVars() has in all those type of files. This function just "reset" the file to be used again.
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCliente/Cliente.php';
$cliente = new Cliente();

function unsetVars(){
    unset($_POST['cadastro']);
    unset($_POST['excluir']);
    unset($_POST['alterar']);
    unset($_POST['listar']);
    unset($_GET['search']);
}

if(isset($_POST['cadastro']) && $_POST['cadastro'] != null){
    unsetVars();

    $cliente->setFirstName($_POST['firstName']);
    $cliente->setLastName($_POST['lastName']);
    $cliente->nomeCompleto();
    $cliente->setEmail($_POST['emailCliente']);
    $cliente->setCpf($_POST['cpfCliente']);
    $cliente->setDataNascimento($_POST['birthCliente']);
    $cliente->setTelefone($_POST['phoneCliente']);
    $cliente->setCep($_POST['CEPCliente']);
    $cliente->setEndereco($_POST['enderecoCliente']);
    $cliente->setNumero($_POST['numeroCliente']);
    $cliente->setEstado($_POST['estadoCliente']);
    $cliente->setBairro(($_POST['bairroCliente'] != null) ? $_POST['bairroCliente'] : "Bairro não informado");
    $cliente->setCidade($_POST['cidadeCliente']);

    $conexao = conexao::conect();
    $resultado = $cliente->cadastrarCliente($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }
}elseif(isset($_POST['excluir']) && $_POST['excluir'] != null){
    unsetVars();

    $cliente->setClientID($_POST['clienteID']);

    $conexao = conexao::conect();
    $resultado = $cliente->deletarCliente($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }
}elseif (isset($_POST['alterar']) && $_POST['alterar'] != null){
    unsetVars();

    $cliente->setClientID($_POST['clienteID']);
    $cliente->setFirstName($_POST['firstName']);
    $cliente->setLastName($_POST['lastName']);
    $cliente->nomeCompleto();
    $cliente->setEmail($_POST['emailCliente']);
    $cliente->setCpf($_POST['cpfCliente']);
    $cliente->setDataNascimento($_POST['birthCliente']);
    $cliente->setTelefone($_POST['phoneCliente']);
    $cliente->setCep($_POST['CEPCliente']);
    $cliente->setEndereco($_POST['enderecoCliente']);
    $cliente->setNumero($_POST['numeroCliente']);
    $cliente->setEstado($_POST['estadoCliente']);
    $cliente->setBairro(($_POST['bairroCliente'] != null) ? $_POST['bairroCliente'] : "Bairro não informado");
    $cliente->setCidade($_POST['cidadeCliente']);

    $conexao = conexao::conect();
    $resultado = $cliente->alterarCliente($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo '1';
    }

}elseif (isset($_POST['alterarSenha']) && $_POST['alterarSenha'] != null){
    unsetVars();

    $cliente->setClientID($_POST['clienteID']);
    $conexao = conexao::conect();
    $resultado = $cliente->alterarSenhaCliente($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        echo $resultado;
    }
}elseif(isset($_POST['listar']) && $_POST['listar'] != null){
    unsetVars();

    $conexao = conexao::conect();
    $resultado = $cliente->listarClientes($conexao);
    conexao::Fechaconexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        return '0';
    }else{
        return $resultado;
    }
}elseif(isset($_GET['search']) && $_GET['search'] != null){

    $busca = urlencode($_GET['search']);
    $conexao = conexao::conect();
    $resultado = $cliente->search_cliente($conexao, $busca);
    conexao::Fechaconexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        unsetVars();
        return '0';
    }else{
        unsetVars();
        return $resultado;
    }
}