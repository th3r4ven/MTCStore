<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 17/12/2019
 * Time: 10:31
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Usuários</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCliente/displayCRUDcliente.php';
$listar = new displayCRUDcliente();

$listar->ListCliente();

?>





<?php
$jspath = '<script src="http://localhost/site/view/dashboard/js/ALTER_Cliente.js"></script>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';