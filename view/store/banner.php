<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 14/01/2020
 * Time: 13:41
 */

?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1><?php echo $active ?></h1>
                <nav class="d-flex align-items-center">
                    <?php echo ($active != 'Home' ? '<a href="http://localhost/site/view/store/index.php">Home<span class="lnr lnr-arrow-right"></span></a><a>' . $active . '</a>' : '<a href="http://localhost/site/view/store/index.php">Home</a>') ?>

                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
