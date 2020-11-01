<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 13:41
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Produtos</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDVariacao/DisplayCRUDVariacao.php';
$variacao = new DisplayCRUDVariacao();

$variacao->formCadastroVariacao();

$variacao->listarVariacoes();

?>




<?php

$jspath = '<script src="http://localhost/site/view/dashboard/js/CRUDVariacao.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';