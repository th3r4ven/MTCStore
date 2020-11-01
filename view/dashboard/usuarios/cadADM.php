<?php
/**
 * Created by PhpStorm.
 * User: HACKCR0W
 * Date: 08/12/2019
 * Time: 13:39
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Usuários</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDuser/displayCRUDadm.php';
$cadastrar = new displayCRUDadm();

?>

<div class="content-block">
    <h1>Cadastrar Administrador ou Gerente</h1>

    <?php $cadastrar->CadastrarUser();?>

</div>

<div class="content-block">
    <h1>Lista de Administradores e Gerentes</h1>

    <?php $cadastrar->ListUsers(); ?>
</div>



<?php

$jspath = '<script src="http://localhost/site/view/dashboard/js/CRUDUser.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';

