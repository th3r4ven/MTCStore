<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/01/2020
 * Time: 16:39
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/homePage/todosProdutos.php';
$produtos = new todosProdutos();


function produtosRecentes(){

    global $produtos;
    $conexao = conexao::conect();
    $produtos->conexao = $conexao;

    $resultado = $produtos->recentes();

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo 'Não foi possivel achar nenhum produto cadastrado :(';

    }else{

         foreach ($resultado as $prod){

             $foto = explode(';', urldecode($prod['imagens']));
             $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");



             echo '
             
             <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="' . $imagem .'" alt="" style="height: 236px;margin-bottom: 0 !important;">
                            <a href="http://localhost/site/view/store/produto.php?id=' . $prod['id'] . '" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Ver mais</h6>
                                </div>
                            </a>
                        </div>
                        <div class="product-details">
                            <a href="http://localhost/site/view/store/produto.php?id=' . $prod['id'] . '"><h6>' . urldecode($prod['titulo']) . '</h6></a>
                            <div class="price">
                                <div style="text-align: center">
                                    <h6>' . ($prod['preco_promo'] > 0 ? 'R$&numsp;' . number_format($prod['preco_promo'], 2, ',', '.') : '') . '</h6>
                                    <h6 class="' . ($prod['preco_promo'] > 0 ? 'l-through' : '') . '">' . 'R$&numsp;' . number_format($prod['preco'], 2, ',', '.') . '</h6><br>
                                </div>
                                <a style="width: 100%; text-align: center; padding-top: 0%; padding-bottom: 0%" class="primary-btn" href="http://localhost/site/view/store/checkout.php?id=' . $prod['id'] . '">Comprar</a>
                                <div class="prd-bottom" style="width: 100%">
                                    <a href="http://localhost/site/view/store/carrinho.php?id=' . $prod['id'] . '&qntd=1" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">Carrinho</p>
                                    </a>
                                    <a href="http://localhost/site/view/store/whishlist.php?id=' . $prod['id'] . '" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="http://localhost/site/view/store/produto.php?id=' . $prod['id'] . '" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">Ver mais</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
             ';

         }
    }
    conexao::FechaConexao($conexao);
}

function produtosDestaque()
{

    global $produtos;
    $conexao = conexao::conect();
    $produtos->conexao = $conexao;

    $resultado = $produtos->populares();

    if ($resultado == '0' || $resultado == null || !isset($resultado)) {
        echo 'Não foi possivel achar nenhum produto cadastrado :(';

    } else {

        foreach ($resultado as $prod) {

            $foto = explode(';', urldecode($prod['imagens']));
            $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");

            echo '
             
             <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="' . $imagem . '" alt="" style="height: 236px; margin-bottom: 0 !important;">
                            <a href="http://localhost/site/view/store/produto.php?id=' . $prod['id'] . '" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Ver mais</h6>
                                </div>
                            </a>
                        </div>
                        <div class="product-details">
                            <a href="http://localhost/site/view/store/produto.php?id=' . $prod['id'] . '"><h6>' . urldecode($prod['titulo']) . '</h6></a>
                            <div class="price">
                                <div style="text-align: center">
                                    <h6>' . ($prod['preco_promo'] > 0 ? 'R$&numsp;' . number_format($prod['preco_promo'], 2, ',', '.') : '') . '</h6>
                                    <h6 class="' . ($prod['preco_promo'] > 0 ? 'l-through' : '') . '">' . 'R$&numsp;' . number_format($prod['preco'], 2, ',', '.') . '</h6><br>
                                </div>
                                <a style="width: 100%; text-align: center; padding-top: 0%; padding-bottom: 0%" class="primary-btn" href="http://localhost/site/view/store/checkout.php?id=' . $prod['id'] . '">Comprar</a>
                                <div class="prd-bottom" style="width: 100%">
                                    <a href="http://localhost/site/view/store/carrinho.php?id=' . $prod['id'] . '&qntd=1" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">Carrinho</p>
                                    </a>
                                    <a href="http://localhost/site/view/store/whishlist.php?id=' . $prod['id'] . '" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="http://localhost/site/view/store/produto.php?id=' . $prod['id'] . '" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">Ver mais</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
             ';

        }
    }
    conexao::FechaConexao($conexao);
}

function promoSemana(){

    global $produtos;
    $conexao = conexao::conect();
    $produtos->conexao = $conexao;

    $resultado = $produtos->semana();

    if ($resultado == '0' || $resultado == null || !isset($resultado)) {
        echo 'Não foi possivel achar nenhum produto cadastrado :(';

    } else {
        foreach ($resultado as $prod) {

            $foto = explode(';', urldecode($prod['imagens']));
            $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");

            echo '
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="' . $imagem . '" alt="" style="width: 70px; height: 70px"></a>
                            <div class="desc">
                                <a href="http://localhost/site/view/store/produto.php?id=' . $prod['id'] . '" class="title">' . urldecode($prod['titulo']) . '</a>
                                <div class="price">
                                    <h6>' . ($prod['preco_promo'] > 0 ? 'R$&numsp;' . number_format($prod['preco_promo'], 2, ',', '.') : '') . '</h6>
                                    <h6 class="' . ($prod['preco_promo'] > 0 ? 'l-through' : '') . '">' . 'R$&numsp;' . number_format($prod['preco'], 2, ',', '.') . '</h6>
                                </div>
                            </div>
                        </div>
                    </div>
            ';
        }
    }
    conexao::FechaConexao($conexao);
}

function bannerLow($id){

    global $produtos;
    $conexao = conexao::conect();
    $produtos->conexao = $conexao;

    $id = explode(';', $id);

    $index = 0;

    foreach ($id as $item) {

        $resultado = $produtos->unique($item[$index]);


        foreach ($resultado as $prod) {

            $foto = explode(';', urldecode($prod['imagens']));
            $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");

            echo '
                    <!-- single exclusive carousel -->
                    <div class="single-exclusive-slider">
                        <img class="img-fluid" src="' . $imagem . '" alt="foto">
                        <div class="product-details">
                            <div class="price" style="text-align: center">
                                <h6>' . ($prod['preco_promo'] > 0 ? 'R$&numsp;' . number_format($prod['preco_promo'], 2, ',', '.') : '') . '</h6>
                                <h6 class="' . ($prod['preco_promo'] > 0 ? 'l-through' : '') . '">' . 'R$&numsp;' . number_format($prod['preco'], 2, ',', '.') . '</h6>
                            </div>
                            <h4>' . urldecode($prod['titulo']) . '</h4>
                            <div class="add-bag d-flex align-items-center justify-content-center">
                                <a class="add-btn" href="http://localhost/site/view/store/carrinho.php?id=' . $prod['id'] . '"><span class="ti-bag"></span></a>
                                <span class="add-text text-uppercase"><a href="http://localhost/site/view/store/carrinho.php?id=' . $prod['id'] . '">Adicionar ao carrinho</a></span>
                            </div>
                        </div>
                    </div>
            ';
        }
    }


}




