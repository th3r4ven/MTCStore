<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 30/01/2020
 * Time: 15:46
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/header.php';
$path.= '<li class="breadcrumb-item active">Usuários</li>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/breadcrumbs.php';

?>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 2%">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rodape" role="tab" aria-controls="rodape" aria-selected="false">Rodapé</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#categoria" role="tab" aria-controls="rodape" aria-selected="false">Categorias</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#agradecimento" role="tab" aria-controls="agradecimento" aria-selected="false">Agradecimento</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="text-center">
                <h2>Configuração do banner principal</h2>
                <img src="">
            </div>

            <form action="" method="post" autocomplete="on" id="formJsonHome">

                <div class="row">
                    <div class="modal-content col-6" style="padding: 1%">
                        <div class="form-inline form-group">
                            <label for="tituloBanner1">Titulo do banner 1: &numsp;</label>
                            <input type="text" id="tituloBanner1" name="tituloBanner1" class="form-control">
                        </div>
                        <div class="form-inline form-group">
                            <label for="textoBanner1">Texto do banner 1: &numsp;</label>
                            <input type="text" id="textoBanner1" name="textoBanner1" class="form-control">
                        </div>
                        <div class="form-inline form-group">
                            <label for="fotoBanner1">Imagem do banner 1: &numsp;</label>
                            <input type="file" accept="image/*" id="fotoBanner1" name="fotoBanner1" >&numsp;&numsp;<br>
                            <small>Recomenda-se uma imagem de 657 x 394</small>
                        </div>
                    </div>

                    <div class="modal-content col-6" style="padding: 1%;">
                        <div class="form-inline form-group">
                            <label for="tituloBanner2">Titulo do banner 2: &numsp;</label>
                            <input type="text" id="tituloBanner2" name="tituloBanner2" class="form-control">
                        </div>
                        <div class="form-inline form-group">
                            <label for="textoBanner2">Texto do banner 2: &numsp;</label>
                            <input type="text" id="textoBanner2" name="textoBanner2" class="form-control">
                        </div>
                        <div class="form-inline form-group">
                            <label for="fotoBanner2">Imagem do banner 2: &numsp;</label>
                            <input type="file" accept="image/*" id="fotoBanner2" name="fotoBanner2" >&numsp;&numsp;<br>
                            <small>Recomenda-se uma imagem de 657 x 394</small>
                        </div>
                    </div>
                </div>

            </form>


        </div>
        <div class="tab-pane fade" id="rodape" role="tabpanel" aria-labelledby="profile-tab">Rodapé</div>
        <div class="tab-pane fade" id="categoria" role="tabpanel" aria-labelledby="profile-tab">Categoria</div>
        <div class="tab-pane fade" id="agradecimento" role="tabpanel" aria-labelledby="contact-tab">Thank you</div>
    </div>


<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';