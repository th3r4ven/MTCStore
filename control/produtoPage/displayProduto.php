<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 24/01/2020
 * Time: 13:44
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/produtoPage/uniqueProd.php';
$produto = new uniqueProd();


function produto(){

    global $produto;
    $conexao = conexao::conect();
    $produto->conexao = $conexao;

    if(isset($_GET['id']) && $_GET['id'] != null){

        $resultado = $produto->selecionarProd($_GET['id']);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            echo 'Não foi possivel achar nenhum produto cadastrado :(';


        }else {

            $index = 0;
            foreach ($resultado as $prod){

                $imagens = explode(';', urldecode($prod['imagens']));


                echo '
                    <!--================Single Product Area =================-->
                    <div class="product_image_area">
                        <div class="container">
                            <div class="row s_product_inner">
                                <div class="col-lg-6">
                                    <div class="s_Product_carousel">
                ';

                foreach ($imagens as $img){
                    if($img != null){
                        echo '
                                        <div class="single-prd-item">
                                            <img class="img-fluid" src="' . $img . '" alt="">
                                        </div>
                        ';
                    }
                }
                echo '   
                                    </div>
                                </div>
                                <div class="col-lg-5 offset-lg-1">
                                    <div class="s_product_text">
                                        <h3>' . urldecode($prod['titulo']) . '</h3>
                                        <div class="form-inline">
                                            <h2>
                                                R$ ' . ($prod['preco_promo'] > 0 ? number_format($prod['preco_promo'], 2, ',', '.') : '') . '
                                            </h2>&numsp;&numsp;
                                             ' . ($prod['preco_promo'] > 0 ? '<h6 style="text-decoration: line-through !important; color: gray;">R$&numsp;' . number_format($prod['preco'], 2, ',', '.').' </h6>' : '<h2>' . number_format($prod['preco'], 2, ',', '.')) . '</h2>' . '
                                        </div>
                                        
                                        <ul class="list">
                                            <li><a class="active" target="_blank" href="http://localhost/site/view/store/categoria.php?categoria=' . urldecode($prod['descricao']) . '"><span>Categoria&numsp;:</span>&numsp;' . urldecode($prod['descricao']) . '</a></li>
                                            <li><a class="active" href="#"><span>Dispon.&numsp;:</span>&numsp; ' . (($prod['estoque'] > 0) ? "Em estoque" : "Fora de estoque") . '</a></li>
                                        </ul>
                                        <p>' . urldecode($prod['descricaoBreve']) .'</p>
                                        <div class="product_count">
                                            <label for="qntd">Quantidade&numsp;:</label>
                                            <input type="number" name="qntd" id="qntd" max="5" min="1" value="1" title="quantidade" class="input-text qty">
                                            <button onclick="var result = document.getElementById(\'qntd\'); var qntd = result.value; if( !isNaN( qntd )) result.value++;return false;"
                                                    class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                            <button onclick="var result = document.getElementById(\'qntd\'); var qntd = result.value; if( !isNaN( qntd ) &amp;&amp; qntd > 1 ) result.value--;return false;"
                                                    class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                        </div>
                                        <div class=" card_area align-items-center">
                                            <a class="primary-btn" href="http://localhost/site/view/store/checkout.php?id=' . $prod['id'] . '">Comprar</a>
                                            <a class="btn btn-outline-info" href="http://localhost/site/view/store/carrinho.php?id=' . $prod['id'] . '&qntd=1" style="margin-top: -7%">Adicionar ao Carrinho</a><br>
                                            <a class="icon_btn" href="http://localhost/site/view/store/wishlist.php?id=' . $prod['id'] . '"><i class="lnr lnr lnr-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--================End Single Product Area =================-->
                    
                    <!--================Product Description Area =================-->
                    <section class="product_description_area">
                        <div class="container">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descrição</a>
                                </li>
                
                                <li class="nav-item">
                                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                                       aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p></p>
                                    <p>'. urldecode($prod['descricaoProd']) .'.</p>
                                </div>
                                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row total_rate">
                                                <div class="col-6">
                                                    <div class="box_total">
                                                        <h5>Pontuação</h5>
                                                        <h4>5 p</h4>
                                                        <h6>(Numero de reviews)</h6>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="rating_list">
                                                        <h3>Baseada em (qtd) de Reviews</h3>
                                                        <ul class="list">
                                                            <li><a href="#">5 Estrelas <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                            class="fa fa-star"></i><i class="fa fa-star"></i> qntd</a></li>
                                                            <li><a href="#">4 Estrelas <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                            class="fa fa-star"></i><i class="fa fa-star"></i> qntd</a></li>
                                                            <li><a href="#">3 Estrelas <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                            class="fa fa-star"></i><i class="fa fa-star"></i> qntd</a></li>
                                                            <li><a href="#">2 Estrelas <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                            class="fa fa-star"></i><i class="fa fa-star"></i> qntd</a></li>
                                                            <li><a href="#">1 Estrela&numsp; <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                            class="fa fa-star"></i><i class="fa fa-star"></i> qntd</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_list">
                                                <!--
                                                Fazer foreach para as reviews
                                                 <div class="review_item">
                                                    <div class="media">
                                                        <div class="d-flex">
                                                            <img src="http://localhost/site/view/store/img/product/review-1.png" alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4>Nome do cidadao</h4>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p>Review do cara</p>
                                                </div>
                                                 -->
                                                <div class="review_item">
                                                    <div class="media">
                                                        <div class="d-flex">
                                                            <img src="http://localhost/site/view/store/img/product/review-1.png" alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4>Nome do cidadao</h4>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p>Review do cara</p>
                                                </div>
                                                <div class="review_item">
                                                    <div class="media">
                                                        <div class="d-flex">
                                                            <img src="http://localhost/site/view/store/img/product/review-2.png" alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4>Nome do cidadao</h4>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p>Review do cara</p>
                                                </div>
                                                <div class="review_item">
                                                    <div class="media">
                                                        <div class="d-flex">
                                                            <img src="http://localhost/site/view/store/img/product/review-3.png" alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4>Nome do cidadao</h4>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p>Review do cara</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="review_box">
                                                <h4>Adicionar sua review</h4>
                
                                                <form class="row contact_form" action="" method="post" id="reviewForm">
                                                    <p>&numsp;&numsp;Sua pontuação:</p>
                                                    <ul class="list">
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                
                                                    <div class="product_count">
                                                        <input type="number" max="5" min="1" name="starReview" id="starReview" value="5" title="Estrelas" class="input-text qty">
                                                        <button onclick="var result = document.getElementById(\'starReview\'); var star = result.value; if( !isNaN( star ) &amp;&amp; star < 5 ) result.value++;return false;"
                                                                class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                                        <button onclick="var result = document.getElementById(\'starReview\'); var star = result.value; if( !isNaN( star ) &amp;&amp; star > 1 ) result.value--;return false;"
                                                                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                                    </div>
                                                    <input type="hidden" id="prodId" name="prodId" readonly value="id do produto">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Endereço de e-mail" required>
                                                        </div>
                                                    </div>
                
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" required></textarea></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" form="reviewForm" value="submit" class="primary-btn">Enviar Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--================End Product Description Area =================-->
                ';

            }
        }
    }
    conexao::FechaConexao($conexao);



}