<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 14/01/2020
 * Time: 12:39
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/homePage/DisplayProdutos.php';

?>


<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Promoções da semana</h1>
                    <p>Texto da promoção da semana.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <?php promoSemana(); ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End related-product Area -->
