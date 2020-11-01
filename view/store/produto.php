<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 20/01/2020
 * Time: 13:09
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/banner.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/produtoPage/displayProduto.php';

produto();


include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/relatedProduct_area.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/footer.php';