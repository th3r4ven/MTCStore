<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/12/2019
 * Time: 15:29
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Produtos</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCupons/DisplayCRUDCupons.php';
$cupons = new DisplayCRUDCupons();
?>

<div class="content-block">
    <h1>Cadastrar Cupons</h1>

    <?php $cupons->Form_Cupons(); ?>

</div>

<div class="content-block">
    <h1>Cupons Cadastrados</h1>

    <?php $cupons->List_Cupons(); ?>

</div>



<?php

$jspath = '<script src="http://localhost/site/view/dashboard/js/CRUDCupons.js"></script>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';
