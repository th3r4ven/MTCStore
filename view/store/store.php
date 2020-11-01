<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 20/01/2020
 * Time: 15:51
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/banner.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/storePage/displayStore.php';
?>
<br><br>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Filtrar por categorias</div>
                    <ul class="main-categories">
                        <?php displayCategoria(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select id="tipoExibicao">
                            <option value="1">Padrão</option>
                            <option value="2">Destaques</option>
                            <option value="3">Mais recentes</option>
                        </select>
                    </div>

                    <div style="margin-top: 10px; margin-left: auto;">
                        <form id="buscarProd" method="get" action="" class="form-inline">
                            <input type="text" placeholder="Pesquise seu produto!" value="<?php echo (isset($_GET['search']) ? $_GET['search'] : ''); ?>" class="form-control" id="search" name="search"><button type="submit" class="btn primary-btn" style="padding: -10px 10px -10px 10px">Pesquisar</button>
                        </form>
                    </div>
                    <div class="sorting" style="margin-left: 1%;">
                        <a class="title" href="http://localhost/site/view/store/store.php" target="_self" >Limpar filtros</a>
                    </div>
                </div>
                <!-- Start products -->

                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <?php init(); ?>
                    </div>
                </section>
                <!-- End Best Seller -->

            </div>
        </div>
    </div>
<br><br>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/relatedProduct_area.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/footer.php';
