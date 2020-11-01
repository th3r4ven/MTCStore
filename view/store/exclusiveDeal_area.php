<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 14/01/2020
 * Time: 12:38
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/homePage/DisplayProdutos.php';

?>

<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding exclusive-left">
                <div class="row clock_sec clockdiv" id="clockdiv">
                    <div class="col-lg-12">
                        <h1>Descontos exclusivos se esgotando!</h1>
                        <p>Confira nossos produtos de verão e garanta já o seu!</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="row clock-wrap">
                            <div class="col clockinner1 clockinner" style="display: none;">
                                <h1 class="days">150</h1>
                                <span class="smalltext">Days</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="hours">23</h1>
                                <span class="smalltext">Hours</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="minutes">47</h1>
                                <span class="smalltext">Mins</span>
                            </div>
                            <div class="col clockinner clockinner1">
                                <h1 class="seconds">59</h1>
                                <span class="smalltext">Secs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="http://localhost/site/view/store/store.php" class="primary-btn">Visitar Loja</a>
            </div>
            <div class="col-lg-6 no-padding exclusive-right">
                <div class="active-exclusive-product-slider">

                    <?php bannerLow('5;7'); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End exclusive deal Area -->
