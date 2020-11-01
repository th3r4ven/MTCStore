<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 14/01/2020
 * Time: 12:38
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/homePage/DisplayProdutos.php';

?>

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Produtos Populares</h1>
                        <p>Confira aqui os nossos produtos mais conhecidos pelos clientes!.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php produtosDestaque(); ?>
            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Produtos Recentes</h1>
                        <p>Confira nossos mais novos produtos da Loja *nome da loja* e garanta já o seu!.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php produtosRecentes(); ?>
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->
