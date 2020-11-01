<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 14/01/2020
 * Time: 12:18
 */

session_start();
// API rastreio https://www.websro.com.br/rastreamento-correios.php?P_COD_UNI=PX914391629BR

include $_SERVER['DOCUMENT_ROOT'] . '/site/control/dynamic_data/pagetitle.php';

$page = new PageTitle();
$title = $page->get_page_title();
$active = $page->paginaFront;


?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="http://localhost/site/view/store/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="Matheus Torres Chiarato">
    <!-- Meta Description -->
    <meta name="description" content="E-commerce para Estudo PHP">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title><?php echo $title ?></title>
    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="http://localhost/site/view/store/css/linearicons.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/themify-icons.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/owl.carousel.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/nice-select.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/nouislider.min.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="http://localhost/site/view/store/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="http://localhost/site/view/store/css/magnific-popup.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/main.css">
    <link rel="stylesheet" href="http://localhost/site/view/store/css/custonStyle.css">
</head>
<?php flush(); ?>
<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="http://localhost/site/view/store/index.php"><img src="http://localhost/site/view/store/img/logo.png" alt="">&numsp;Titulo da loja</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item <?php echo ($active == 'Home' ? 'active' : ''); ?>"><a class="nav-link" href="http://localhost/site/view/store/index.php">Home</a></li>
                            <li class="nav-item submenu dropdown <?php echo ($active == 'Loja' || $active == 'Produto' || $active == 'Carrinho' || $active == 'Categoria' ? 'active' : ''); ?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Loja</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/store.php">Loja</a></li>
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/produto.php">Produto individual</a></li>
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/checkout.php">Checkout</a></li>
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/carrinho.php">Carrinho</a></li>
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/ThankyouPage.php">Página de agradecimento</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown <?php echo ($active == 'Menu' ? 'active' : ''); ?>">
                                <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Menu</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="">Submenu 1</a></li>
                                    <li class="nav-item"><a class="nav-link" href="">Submenu 2</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/login.php">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/tracking.php">Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="http://localhost/site/view/store/elements.php">Elements</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link <?php echo ($active == 'Contato' ? 'active' : ''); ?>" href="http://localhost/site/view/store/contato.php">Contato</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="http://localhost/site/view/store/carrinho.php" class="cart"><span class="ti-bag"></span></a></li>
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Pesquise produtos por nome, descricao, marca, SKU ou EAN">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Pesquisar Produtos"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header Area -->