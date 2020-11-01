<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 24/01/2020
 * Time: 12:19
 */


/**
 * tem um de 8 dps 2 de 4 dps um de 8 dps o sozinho
 */
function categoria(){
    cat8(false);
    cat4();
    cat8(true);
}

function cat8($verf){
    ?>

    <div class="col-lg-8 col-md-8">
        <div class="single-deal">
            <div class="overlay"></div>
            <img class="img-fluid w-100" src="img/category/c1.jpg" alt="">
            <a href="http://localhost/site/view/store/categoria.php?categoria=*nome da categoria*" class="img-pop-up" target="_blank">
                <div class="deal-details">
                    <h6 class="deal-title">*nome da categoria*</h6>
                </div>
            </a>
        </div>
    </div>

    <?php
}

function cat4(){
    ?>

    <div class="col-lg-4 col-md-4">
        <div class="single-deal">
            <div class="overlay"></div>
            <img class="img-fluid w-100" src="img/category/c2.jpg" alt="">
            <a href="http://localhost/site/view/store/categoria.php?categoria=*nome da categoria*" class="img-pop-up" target="_blank">
                <div class="deal-details">
                    <h6 class="deal-title">*nome da categoria*</h6>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="single-deal">
            <div class="overlay"></div>
            <img class="img-fluid w-100" src="img/category/c2.jpg" alt="">
            <a href="http://localhost/site/view/store/categoria.php?categoria=*nome da categoria*" class="img-pop-up" target="_blank">
                <div class="deal-details">
                    <h6 class="deal-title">*nome da categoria*</h6>
                </div>
            </a>
        </div>
    </div>

    <?php
}

function catSozinho(){
    ?>

    <div class="col-lg-4 col-md-6">
        <div class="single-deal">
            <div class="overlay"></div>
            <img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
            <a href="http://localhost/site/view/store/categoria.php?categoria=*nome da categoria*" class="img-pop-up" target="_blank">
                <div class="deal-details">
                    <h6 class="deal-title">*nome da categoria*</h6>
                </div>
            </a>
        </div>
    </div>

    <?php
}