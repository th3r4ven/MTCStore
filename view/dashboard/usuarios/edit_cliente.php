<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 20/12/2019
 * Time: 14:29
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Usuários</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';
include_once $_SERVER['DOCUMENT_ROOT'] .  '/site/control/CRUDCliente/Alter_Cliente.php';



?>





<?php

$jspath = '<script src="http://localhost/site/view/dashboard/js/Alter_Cliente.js"></script>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';