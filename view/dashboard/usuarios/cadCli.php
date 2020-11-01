<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 09/12/2019
 * Time: 10:01
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Usuários</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCliente/displayCRUDcliente.php';
$cadastrar = new displayCRUDcliente();

$cadastrar->displayFormCadastro();

?>





<?php

$jspath = '<script src="http://localhost/site/view/dashboard/js/CRUDCliente.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';
