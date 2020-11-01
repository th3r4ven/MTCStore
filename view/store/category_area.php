<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 14/01/2020
 * Time: 12:37
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/homePage/DisplayCategoria.php';

?>


<!-- Start category Area -->
<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <?php
                        categoria();
                    ?>
                </div>
            </div>
            <?php catSozinho() ?>
        </div>
    </div>
</section>
<!-- End category Area -->
