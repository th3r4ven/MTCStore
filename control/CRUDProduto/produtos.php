<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 27/12/2019
 * Time: 10:29
 */

/**
 * This file process all the data received via POST from the form on http://localhost/site/view/dashboard/usuarios/cad_prod.php.
 * first of all, calls for the class Produto.
 *
 * The functions is divided by values on POST.
 * When the $_POST['listar'] is set this file return all the cupons that is stored in the database,
 * when another $_POST variable is set, this file act in different way.
 *
 * All the $_POST variables is named as what they do.
 *
 * The function insetVars() has in all those type of files. This function just "reset" the file to be used again.
 */

include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDproduto/Produto.php';
$produto = new Produto();

$imgName = "";
$number = 0;

function unsetVars5(){
    unset($_POST['cadastro']);
    unset($_POST['excluir']);
    unset($_POST['alterar']);
    unset($_GET['search']);
    unset($_POST['listar']);
    unset($_POST['unique']);
}

function enviarfoto($foto){
    move_uploaded_file($foto['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/site/assets/images/" . $foto['name']);
}

function prepImgName($foto){
    global $imgName;
    $imgName .= 'http://localhost/site/assets/images/' . $foto['name'] . ";";
}

function deletarFotos($foto){

    $fotos = explode(';', $foto);
    $index = 0;
    foreach ($fotos as $img){
        $string = explode('http://localhost', $fotos[$index]);
        if(isset($string['1'])){
            $string = $_SERVER['DOCUMENT_ROOT'] . $string['1'];
            unlink($string);
            $index ++;
        }

    }

}

if(isset($_POST['cadastro']) && $_POST['cadastro'] != null){

    if ($_POST['precoProd'] > $_POST['precoPromoProd']){
        unsetVars5();

        $produto->setTitulo($_POST['tituloProd']);
        $produto->setDescricaoBreve($_POST['descricaoBreve']);
        $produto->setDescricao($_POST['descricaoProd']);
        $produto->setPreco($_POST['precoProd']);
        $produto->setPrecoPromo($_POST['precoPromoProd']);
        $produto->setEstoque($_POST['estoqueProd']);
        $produto->setCupon($_POST['cuponProd']);
        $produto->setDestaque($_POST['destaque']);
        $produto->setSkuEan($_POST['sku_ean']);
        $produto->setMarca($_POST['marcaProd']);
        $produto->setMedidas($_POST['medidas']);


        if(!empty($_FILES['foto1']['tmp_name'])){
            prepImgName($_FILES['foto1']);
            $number += 1;
        }
        if(!empty($_FILES['foto2']['tmp_name'])){
            prepImgName($_FILES['foto2']);
            $number += 1;
        }
        if(!empty($_FILES['foto3']['tmp_name'])){
            prepImgName($_FILES['foto3']);
            $number += 1;
        }
        if(!empty($_FILES['foto4']['tmp_name'])){
            prepImgName($_FILES['foto4']);
            $number += 1;
        }

        $produto->setImagens($imgName);
        $produto->setEntrega($_POST['entrega']);
        $produto->setVariacao($_POST['VariacaoProd']);
        $produto->setCategoria($_POST['CategoriaProd']);
        $produto->setSubCategoria($_POST['SubCategoriaProd']);

        $conexao = conexao::conect();
        $resultado = $produto->cadastrarProduto($conexao);
        conexao::Fechaconexao($conexao);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            echo '0';
        }else{
            for ($i = 1; $i<=$number + 1; $i++){
                if(isset($_FILES['foto' . $i]) && !empty($_FILES['foto' . $i])){
                    enviarfoto($_FILES['foto'.$i]);
                }
            }
            echo '1';
        }
    }else{echo '0';}
}elseif(isset($_POST['excluir']) && $_POST['excluir'] != null){
    unsetVars5();

    $produto->setId($_POST['idProduto']);

    $conexao = conexao::conect();

    $imagens = $produto->obterImagens($conexao);

    $resultado = $produto->excluirProduto($conexao);
    conexao::Fechaconexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo '0';
    }else{
        deletarFotos(urldecode($imagens));
        echo '1';
    }
}elseif(isset($_POST['alterar']) && $_POST['alterar'] != null){
    unsetVars5();

    if(isset($_POST['newImagens']) && isset($_POST['oldImagem'])){

        deletarFotos($_POST['oldImagem']);

        if(!empty($_FILES['foto1']['tmp_name'])){
            prepImgName($_FILES['foto1']);
            $number += 1;
        }
        if(!empty($_FILES['foto2']['tmp_name'])){
            prepImgName($_FILES['foto2']);
            $number += 1;
        }
        if(!empty($_FILES['foto3']['tmp_name'])){
            prepImgName($_FILES['foto3']);
            $number += 1;
        }
        if(!empty($_FILES['foto4']['tmp_name'])){
            prepImgName($_FILES['foto4']);
            $number += 1;
        }
        $produto->setId($_POST['idProduto']);
        $produto->setImagens($imgName);

        $conexao = conexao::conect();
        $resultado = $produto->alterarImagens($conexao);
        conexao::FechaConexao($conexao);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            echo '0';
        }else{
            for ($i = 1; $i<=$number + 1; $i++){
                if(isset($_FILES['foto' . $i]) && !empty($_FILES['foto'.$i]['tmp_name'])){
                    enviarfoto($_FILES['foto'.$i]);
                }
            }
            echo '1';
        }

    }else{
        $produto->setId($_POST['idProduto']);
        $produto->setTitulo($_POST['tituloProd']);
        $produto->setDescricaoBreve($_POST['descricaoBreve']);
        $produto->setDescricao($_POST['descricaoProd']);
        $produto->setPreco($_POST['precoProd']);
        $produto->setPrecoPromo($_POST['precoPromoProd']);
        $produto->setEstoque($_POST['estoqueProd']);
        $produto->setCupon($_POST['cuponProd']);
        $produto->setDestaque($_POST['destaque']);
        $produto->setSkuEan($_POST['sku_ean']);
        $produto->setMarca($_POST['marcaProd']);
        $produto->setMedidas($_POST['medidas']);
        $produto->setImagens($_POST['imagens']);
        $produto->setEntrega($_POST['entrega']);
        $produto->setVariacao($_POST['VariacaoProd']);
        $produto->setCategoria($_POST['CategoriaProd']);
        $produto->setSubCategoria($_POST['SubCategoriaProd']);

        $conexao = conexao::conect();
        $resultado = $produto->alterarProduto($conexao);
        conexao::Fechaconexao($conexao);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            echo '0';
        }else{
            echo '1';
        }
    }


}elseif(isset($_POST['listar']) && $_POST['listar'] != null){
    unsetVars5();

    $conexao = conexao::conect();
    $resultado = $produto->listarProdutos($conexao);
    conexao::Fechaconexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        return '0';
    }else{
        return $resultado;
    }
}elseif(isset($_GET['search']) && $_GET['search'] != null){

    $busca = urlencode($_GET['search']);
    $conexao = conexao::conect();
    $resultado = $produto->search_produto($conexao, $busca);
    conexao::Fechaconexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        unsetVars5();
        return '0';
    }else{
        unsetVars5();
        return $resultado;
    }
}elseif (isset($_POST['unique']) && $_POST['unique'] != null){
    unsetVars5();

    $produto->setId($_GET['produto']);

    $conexao = conexao::conect();
    $resultado = $produto->uniqueProduct($conexao);
    conexao::FechaConexao($conexao);

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        return '0';
    }else{
        return $resultado;
    }
}else{
    echo "Não foi possivel realizar a operação";
}