<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/12/2019
 * Time: 11:53
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Produtos</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCategoria/DisplayCRUDCategoria.php';
$categoria = new DisplayCRUDCategoria();

$categoria->formCadastroCategoria();

$categoria->listarCategorias();

?>




<?php

$jspath = '<script src="http://localhost/site/view/dashboard/js/CRUDCategoria.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';
