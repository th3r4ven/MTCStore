<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 09/12/2019
 * Time: 10:39
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Conta</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';

include $_SERVER['DOCUMENT_ROOT'] . '/site/control/profile/profile.php';

?>

<div class="content-block">

    <h1>Configurações da Conta</h1>

    <?php exibirPerfil(); ?>

</div>

<?php

$jspath =  '<script src="http://localhost/site/view/dashboard/js/Profile.js"></script>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';
