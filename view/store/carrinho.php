<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 14/01/2020
 * Time: 15:55
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/banner.php';

?>

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Remover</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="remover"><button type="button" class="btn btn-outline-danger removeButton">X</button></td>
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="img/cart.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <p>Nome do Produto</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>Preço do produto</h5>
                        </td>
                        <td>
                            <div class="product_count">
                                <input type="number" name="qty" id="sst3" min="1" value="1" title="Quantity:"
                                       class="input-text qty">
                                <button onclick="var result = document.getElementById('sst3'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                <button onclick="var result = document.getElementById('sst3'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                            </div>
                        </td>
                        <td>
                            <h5>Preço multiplicado pela quantidade</h5>
                        </td>
                    </tr>

                    <tr class="bottom_button">
                        <td></td>
                        <td>
                            <a class="gray_btn" href="#">Atualizar carrinho</a>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            <div class="cupon_text d-flex align-items-center">
                                <input type="text" placeholder="Codigo do Cupom">
                                <a class="primary-btn" href="#">Aplicar</a>
                                <a class="gray_btn" href="#">Cancelar</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td><td></td><td>
                            <h5>Subtotal</h5>
                        </td><td></td>

                        <td>
                            <h5>Somatoria dos totais acima</h5>
                        </td>
                    </tr>
                    <tr class="shipping_area">
                        <td></td><td></td>
                        <td>
                            <h5>Endereço:</h5>
                        </td><td></td>
                        <td>
                            <div class="shipping_box">
                                <ul class="list">
                                    <input type="text" placeholder="CEP" id="cep" name="cep" style="width: 40%">
                                    <li id="endereco">Endereço</li>
                                    <li id="cidade">Cidade</li>
                                    <li id="estado">Estado</li>
                                    <li>O calculo do frete será feito antes da compra ser finalizada</li>
                                </ul>


                            </div>
                        </td>
                    </tr>
                    <tr class="out_button_area">
                        <td></td><td></td><td></td><td></td>
                        <td>
                            <div class="checkout_btn_inner d-flex align-items-center">
                                <a class="gray_btn" href="#">Continuar comprando</a>
                                <a class="primary-btn" href="#">Finalizar compra</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
    <style>.remover{width: 5%;}</style>

<?php

include 'footer.php';
