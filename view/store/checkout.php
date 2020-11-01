<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 15/01/2020
 * Time: 12:57
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/banner.php';

?>

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="returning_customer">
                <div class="check_title">
                    <h2>Ja comprou no site? <a href="#">Clique aqui para fazer o login</a></h2>
                </div>
                <p>Ao clicar no link acima você será redirecionado para fazer o login, e retornará para o checkout novamente.</p>
            </div>
            <div class="cupon_area">
                <div class="check_title">
                    <h2>Tem um codigo? <a id="ativarCupon" href="#">Clique aqui para inserir seu codigo</a></h2>
                </div>
                <input type="text" placeholder="Inisra o código do cupom">
                <a class="tp_btn" href="">Aplicar Cupom</a> <button class="btn">Remover Cupom</button>
            </div>
            <div class="client_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Informações do cliente</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate" autocomplete="on">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="firstName" name="firstName">
                                <span class="placeholder" data-placeholder="Nome"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="lastName" name="lastName">
                                <span class="placeholder" data-placeholder="Sobrenome"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email">
                                <span class="placeholder" data-placeholder="exemplo@gmail.com"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="nascimento" name="nascimento">
                                <span class="placeholder" data-placeholder="Data Nascimento"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number">
                                <span class="placeholder" data-placeholder="Telefone"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="cpf" name="cpf">
                                <span class="placeholder" data-placeholder="CPF"></span>
                            </div>
                            <h3 class="col-md-12">Detalhes de entrega</h3>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="cep" name="cep">
                                <span class="placeholder" data-placeholder="CEP"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="endereco" name="endereco">
                                <span class="placeholder" data-placeholder="Endereço"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="numero" name="numero">
                                <span class="placeholder" data-placeholder="Número"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <select id="cidade" class="country_select">
                                    <option value="0">Selecione um estado...</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="bairro" name="bairro">
                                <span class="placeholder" data-placeholder="Bairro"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="cidade" name="cidade">
                                <span class="placeholder" data-placeholder="Cidade"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" name="orderNote" id="orderNote" rows="1" placeholder="Notas do pedido"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Seu Pedido</h2>
                            <ul class="list">
                                <li><a>Produto <span>Total</span></a></li>
                                <li><a href="#">Nome do produto <span class="middle">x qnt</span> <span class="last">preco x qtn</span></a></li>
                            </ul>
                            <ul class="list list_2">
                                <li><a>Subtotal <span>Total sem frete</span></a></li>
                                <li><a>Shipping <span>frete</span></a></li>
                                <li><a>Total <span>Total com frete</span></a></li>
                            </ul>

                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" checked id="f-option6" name="selector">
                                    <label for="f-option6">Mercado Pago</label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Em breve integração com o mercado pago</p>
                            </div>
                            <div class="creat_account">
                                <p>Ao comprar você concorda com nossos termos e condições de compra e prazos de envio.</p>
                            </div>
                            <a class="primary-btn" href="#">Pagar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/store/footer.php';
