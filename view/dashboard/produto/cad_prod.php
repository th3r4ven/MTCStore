<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 13/12/2019
 * Time: 12:05
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Produtos</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDProduto/DisplayCRUDprod.php';

$cadastrar = new displayCRUDprod();

?>

<?php $cadastrar->displayForm(); ?>


<?php

$jspath = '<script src="http://localhost/site/view/dashboard/js/CRUDProduto.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';