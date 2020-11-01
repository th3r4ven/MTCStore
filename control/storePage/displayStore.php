<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 28/01/2020
 * Time: 11:54
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/storePage/allProdStore.php';
$store = new allProdStore();

function displayCategoria(){

    global $store;
    $conexao = conexao::conect();
    $store->conexao = $conexao;

    $resultado = $store->allCategorias();

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo 'Não foi possivel achar nenhum produto cadastrado :(';

    }else {
        $number = 0;
        foreach ($resultado as $cat) {

            $subcat = $store->allSubCategoria($cat['descricao']);

            $contador = $store->countProdCategoria($cat['descricao']);
            $descricao = explode('+', $cat['descricao']);
            $descri= "";
            foreach ($descricao as $desc){$descri .= $desc;}

            foreach ($contador as $cont){

                echo '
            
                                <li class="main-nav-list"><a data-toggle="collapse" href="#' . urldecode($descri) . '" aria-expanded="false" aria-controls="' . urldecode($descri) . '"><span
                                            class="lnr lnr-arrow-right"></span>' . urldecode($cat['descricao']) . '<span class="number">'. $cont['COUNT(*)'] . '</span></a>
                                    <ul class="collapse" id="' . urldecode($descri) . '" data-toggle="collapse" aria-expanded="false" aria-controls="' . urldecode($descri) . '">
                                        <li class="main-nav-list child"><a href="http://localhost/site/view/store/store.php?categoria=' . $cat['id'] . '">' . urldecode($cat['descricao']) . '<span class="number">'. $cont['COUNT(*)'] . '</span></a></li>';

                foreach ($subcat as $sub){

                    $subContator = $store->countProdSubCategoria($sub['subdescricao']);

                    foreach ($subContator as $subCont){
                        echo'               <li class="main-nav-list child"><a href="http://localhost/site/view/store/store.php?categoria=' . $cat['id'] . '&subcategoria=' . $sub['id'] . '">' . urldecode($sub['subdescricao']) . '<span class="number">' . $subCont['COUNT(*)'] . '</span></a></li>';
                    }
                }

                echo'
                                    </ul>
                                </li>
            ';
                $number++;
            }


        }
    }
}

function init(){

    global $store;

    if(isset($_GET['subcategoria']) && $_GET['subcategoria'] != null){

        $conexao = conexao::conect();
        $store->conexao = $conexao;

        $resultado = $store->subCategoriaProduto($_GET['categoria'], $_GET['subcategoria']);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            echo 'Não foi possivel achar nenhum produto cadastrado :(';

        }else {

            foreach ($resultado as $prod) {

                $foto = explode(';', urldecode($prod['imagens']));
                $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");

                echo '
        
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="' . $imagem .'" alt="" style="height: 236px; margin-bottom: 0 !important;">
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

    }elseif (isset($_GET['categoria']) && $_GET['categoria'] != null){

        $conexao = conexao::conect();
        $store->conexao = $conexao;

        $resultado = $store->categoriaProduto($_GET['categoria']);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            echo 'Não foi possivel achar nenhum produto cadastrado :(';

        }else {

            foreach ($resultado as $prod) {

                $foto = explode(';', urldecode($prod['imagens']));
                $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");

                echo '
        
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="' . $imagem .'" alt="" style="height: 236px; margin-bottom: 0 !important;">
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

    }elseif (isset($_GET['search']) && $_GET['search'] != null){

        $busca = urlencode($_GET['search']);
        $conexao = conexao::conect();
        $store->conexao = $conexao;

        $resultado = $store->searchProduto($busca);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            echo 'Não foi possivel achar nenhum produto cadastrado :(';

        }else {

            foreach ($resultado as $prod) {

                $foto = explode(';', urldecode($prod['imagens']));
                $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");

                echo '
        
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="' . $imagem .'" alt="" style="height: 236px; margin-bottom: 0 !important;">
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

    }else{displayProdutos();}

}


function displayProdutos(){

    global $store;
    $conexao = conexao::conect();
    $store->conexao = $conexao;

    $resultado = $store->allProdutos();

    if($resultado == '0' || $resultado == null || !isset($resultado)){
        echo 'Não foi possivel achar nenhum produto cadastrado :(';

    }else {

        foreach ($resultado as $prod) {

            $foto = explode(';', urldecode($prod['imagens']));
            $imagem = (isset($foto['0']) ? $foto['0'] : "Não foi possivel encontrar a foto");

            echo '
        
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="single-deal">
                                    <div class="overlay"></div>
                                    <img class="img-fluid w-100" src="' . $imagem .'" alt="" style="height: 236px; margin-bottom: 0 !important;">
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

