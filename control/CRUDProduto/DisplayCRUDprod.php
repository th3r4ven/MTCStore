<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 13/12/2019
 * Time: 11:35
 */

/**
 * Class DisplayCRUDprod
 *
 * This class is responsible for displaying the forms on the front-end.
 */

class DisplayCRUDprod
{


    public function displayForm()
    {

        if (isset($_GET['produto']) && $_GET['action'] == "edit") {
            $_POST['unique'] = true;
            include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDProduto/produtos.php';

            foreach ($resultado as $resul) {

                $resul['preco'] = number_format($resul['preco'], 2, ',', '.');
                $arrayPreco = explode(',', $resul['preco'], '2');
                $preco = $arrayPreco['0'];

                if($preco > 999){
                    $preco = explode('.', $preco);
                    $preco = $preco[0] . $preco[1];
                }
                $precoCent = $arrayPreco['1'];

                $resul['preco_promo'] = number_format($resul['preco_promo'], 2, ',', '.');
                $arrayPreco = explode(',', $resul['preco_promo'], '2');
                $precoPromo = $arrayPreco['0'];
                $precoPromoCent = $arrayPreco['1'];

                $arrayImagens = explode(';', urldecode($resul['imagens']));
                $medidas = explode(';',urldecode($resul['medidas']));
                $medida['altura'] = $medidas['0'];
                $medida['comprimento'] = $medidas['1'];
                $medida['largura'] = $medidas['2'];
                $medida['peso'] = $medidas['3'];


                echo '
                        <div class="content-block">
                    
                        <h1 id="titulo">Editar Produto</h1>
                    
                        <div class="modal-content">
            
                            <form id="editProd" action="" method="post" autocomplete="off">
                        
                                <div style="padding: 1%">
                                    
                                    <div class="form-group">
                                        <label for="tituloProd">Titulo do Produto: </label><small><sup style="color: red"> *</sup></small>
                                        <input type="text" id="tituloProd" name="tituloProd" class="form-control" maxlength="70" value="' . urldecode($resul['titulo']) . '" required>
                                        <input type="hidden" id="idProduto" name="idProduto" value="' . $resul['id'] . '" readonly>
                                        <input type="hidden" id="imagensDoProduto" name="imagensDoProduto" value="' . urldecode($resul['imagens']) . '" readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="descricaoBreve">Breve descrição do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <textarea rows="3" cols="3" class="form-control" id="descricaoBreve" name="descricaoBreve" maxlength="450">' . urldecode($resul['descricaoBreve']) . '</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="descricao">Descrição do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <textarea rows="10" cols="100" class="form-control" id="descricao" name="descricao" maxlength="4500">' . urldecode($resul['descricaoProd']) . '</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="preco">Preço do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <div class="form-inline">
                                            <input type="number" id="preco" name="preco" class="form-control" min="1" style="width: 10%" value="' . $preco . '">&numsp;.&numsp;<input type="number" class="form-control" id="centavos" value="' . $precoCent . '" min="0" max="99" name="centavos" style="width: 5%">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="precoPromo">Preço promocional do produto:</label>
                                        <div class="form-inline">
                                        <input type="text" id="precoPromo" name="precoPromo" class="form-control" style="width: 10%" value="' . $precoPromo . '">&numsp;.&numsp;<input type="number" class="form-control" id="centavosPromo" name="centavosPromo" value="' . $precoPromoCent . '" min="0" max="99" style="width: 5%">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="estoque">Estoque: </label>&numsp;<small><sup style="color: red"> *</sup></small>
                                        <input type="number" id="estoque" name="estoque" class="form-control" required style="width: 15%" min="1" value="' . $resul['estoque'] . '">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="cupon">Esse produto aceita cupon de desconto?</label>&numsp;
                                        <input type="checkbox" id="cupon" name="cupon" class="checkbox" ' . ($resul['cupom'] == 1 ? 'checked' : '') . '>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="destaque">Deseja colocar esse produto em destaque?</label>&numsp;
                                        <input type="checkbox" id="destaque" name="destaque" class="checkbox" ' . ($resul['destaque'] == 1 ? 'checked' : '') . '>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="SKUEAN">SKU ou EAN do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <input type="text" id="SKUEAN" name="SKUEAN" class="form-control" style="width: 50%" value="' . $resul['sku_ean'] . '">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="marca">Marca:</label><small><sup style="color: red"> *</sup></small>
                                        <input type="text" id="marca" name="marca" class="form-control" style="width: 50%" value="' . urldecode($resul['marca']) . '">
                                    </div>
                                    
                                    <div class="form-group form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="altura" name="altura" value="' . $medida['altura'] . '" placeholder="Altura">&numsp;cm.&numsp;
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="comprimento" name="comprimento" value="' . $medida['comprimento'] . '" placeholder="Comprimento">&numsp;cm.&numsp;
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="largura" name="largura" value="' . $medida['largura'] . '" placeholder="Largura">&numsp;cm.&numsp;
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="peso" name="peso" value="' . $medida['peso'] . '" placeholder="Peso">&numsp;Kg.
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="frete">Esse produto possui frete grátis?</label><small><sup style="color: red"> *</sup></small>&numsp;
                                        <input type="checkbox" id="frete" name="frete" class="checkbox" ' . ($resul['entrega'] == 1 ? 'checked' : '') . '>
                                    </div>
                    ';

                $_POST['listar'] = true;
                include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDVariacao/variacoes.php';

                echo '
                                    <div class="form-group form-inline">
                                        <div class="form-group">
                                            <label for="variaco">Variação do produto:&numsp;</label>
                                            <select id="variacao" name="variacao" class="form-control">
                    ';

                if (isset($resultado) && $resultado != null && $resultado != '0') {
                    foreach ($resultado as $variacao) {
                        $nomeVariacao = urldecode($variacao['nome']);
                        echo '<option value="' . $nomeVariacao . '" ' . (urldecode($resul['nome']) == $nomeVariacao ? 'selected' : '') . '>' . $nomeVariacao . '</option>';
                    }
                }

                echo '
                                            </select>
                                        </div>&numsp;
                    ';

                $_POST['listar'] = true;
                include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCategoria/categorias.php';

                echo '
                                        <div class="form-group">
                                            <label for="categoria">Categoria do produto:&numsp;</label>
                                            <select id="categoria" name="categoria" class="form-control">
                    ';

                if (isset($resultado) && $resultado != null && $resultado != '0') {
                    foreach ($resultado as $categoria) {
                        $categoria = urldecode($categoria['descricao']);
                        echo '<option value="' . $categoria . '" ' . (urldecode($resul['descricao']) == $categoria ? 'selected' : '') . '>' . $categoria . '</option>';
                    }
                }

                echo '
                                            </select>
                                        </div>&numsp;
                    ';

                $_POST['listar'] = true;
                include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDSubCategoria/subcategorias.php';

                echo '
                                        <div class="form-group">
                                            <label for="subcategoria">Sub-categoria do produto:&numsp;</label>
                                            <select id="subcategoria" name="subcategoria" class="form-control">
                                                
                    ';

                if (isset($resultado) && $resultado != null && $resultado != '0') {
                    foreach ($resultado as $subcategoria) {
                        $subcategoria = urldecode($subcategoria['subdescricao']);
                        echo '<option value="' . $subcategoria . '" ' . (urldecode($resul['subdescricao']) == $subcategoria ? 'selected' : '') . '>' . $subcategoria . '</option>';
                    }
                }

                echo '
                                            </select>
                                        </div>
                                    </div>
                    ';

                echo '
                                    <hr>
                                  
                                    <div class="form-group imagens">
                                        <label for="fotoPrincipal">Foto principal:</label><small><sup style="color: red"> *</sup></small>&numsp;
                                        
                                        <input type="file" id="fotoPrincipal" name="fotoPrincipal" accept="image/*" required>
                                    </div>
                                    
                                    <div class="form-group imagens">
                                        <label>Fotos adicionais</label>
                                        <div class="form-group form-inline">
                                            <div>';

                echo '<input type="file" id="foto2" name="foto2" accept="image/*">
                                            </div>
                                            <div>';

                echo '<input type="file" id="foto3" name="foto3" accept="image/*">
                                            </div>
                                            <div>';

                echo '<input type="file" id="foto4" name="foto4" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="imagensDosProdutos" class="form-group" style="max-width: 30%; max-height: 10%;">
                                    <label>Foto dos produtos.</label><br>
                                        <img class="col-lg-4 col-md-6" src="' . $arrayImagens['0'] . '" id="displayfoto1" name="displayfoto1" alt="Foto Principal do produto" style="max-width: 60%"">
                                        ';
                if (isset($arrayImagens['1']) && $arrayImagens['1'] != null) {
                    echo '<img class="col-lg-4 col-md-6" src="' . $arrayImagens['1'] . '" id="displayfoto2" name="displayfoto2" alt="Foto adicional do produto" style="max-width: 60%" >';
                }
                if (isset($arrayImagens['2']) && $arrayImagens['2'] != null) {
                    echo '<img class="col-lg-4 col-md-6" src="' . $arrayImagens['2'] . '" id="displayfoto3" name="displayfoto3" alt="Foto adicional do produto" style="max-width: 60%">';
                }
                if (isset($arrayImagens['3']) && $arrayImagens['3'] != null) {
                    echo '<img class="col-lg-4 col-md-6" src="' . $arrayImagens['3'] . '" id="displayfoto4" name="displayfoto4" alt="Foto adicional do produto" style="max-width: 60%">';
                }
                echo '
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="button" id="novaImagem" name="novaImagem" class="btn btn-outline-primary">Trocar imagens do produto</button>
                                        <button type="button" id="cancelarNovaImagem" name="cancelarNovaImagem" class="btn btn-secondary">Cancelar</button>
                                    </div>
                                    
                                    <button type="submit" form="editProd" id="alterarProduto" name="submitProduto" class="btn btn-warning">Alterar</button>                                    
                                </div>
                            </form>
                        </div>
                    </div>
                ';
            }
        } else {

            echo '
                        <div class="content-block">
                    
                        <h1 id="titulo">Cadastrar Produto</h1>
                    
                        <div class="modal-content">
            
                            <form id="cadProd" action="" method="post" autocomplete="off">
                        
                                <div style="padding: 1%">
                                    
                                    <div class="form-group">
                                        <label for="tituloProd">Titulo do Produto: </label><small><sup style="color: red"> *</sup></small>
                                        <input type="text" id="tituloProd" name="tituloProd" class="form-control" maxlength="70" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="descricaoBreve">Breve descrição do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <textarea rows="3" cols="3" class="form-control" id="descricaoBreve" name="descricaoBreve" maxlength="450"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="descricao">Descrição do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <textarea rows="10" cols="100" class="form-control" id="descricao" name="descricao" maxlength="4500"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="preco">Preço do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <div class="form-inline">
                                            <input type="number" id="preco" name="preco" class="form-control" min="1" style="width: 10%">&numsp;.&numsp;<input type="number" class="form-control" id="centavos" value="00" min="0" max="99" name="centavos" style="width: 5%">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="precoPromo">Preço promocional do produto:</label>
                                        <div class="form-inline">
                                        <input type="text" id="precoPromo" name="precoPromo" class="form-control" style="width: 10%">&numsp;.&numsp;<input type="number" class="form-control" id="centavosPromo" name="centavosPromo" value="00" min="0" max="99" style="width: 5%">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="estoque">Estoque: </label>&numsp;<small><sup style="color: red"> *</sup></small>
                                        <input type="number" id="estoque" name="estoque" class="form-control" required style="width: 15%" min="1">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="cupon">Esse produto aceita cupon de desconto?</label>&numsp;
                                        <input type="checkbox" id="cupon" name="cupon" class="checkbox" checked>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="destaque">Deseja colocar esse produto em destaque?</label>&numsp;
                                        <input type="checkbox" id="destaque" name="destaque" class="checkbox">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="SKUEAN">SKU ou EAN do produto:</label><small><sup style="color: red"> *</sup></small>
                                        <input type="text" id="SKUEAN" name="SKUEAN" class="form-control" style="width: 50%">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="marca">Marca:</label><small><sup style="color: red"> *</sup></small>
                                        <input type="text" id="marca" name="marca" class="form-control" style="width: 50%" >
                                    </div>
                                    
                                    <div class="form-group form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura">&numsp;cm&numsp;
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="comprimento" name="comprimento" placeholder="Comprimento">&numsp;cm.&numsp;
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="largura" name="largura" placeholder="Largura">&numsp;cm.&numsp;
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso">&numsp;Kg.
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="frete">Esse produto possui frete grátis?</label><small><sup style="color: red"> *</sup></small>&numsp;
                                        <input type="checkbox" id="frete" name="frete" class="checkbox">
                                    </div>
                    ';

            $_POST['listar'] = true;
            include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDVariacao/variacoes.php';

            echo '
                                    <div class="form-group form-inline">
                                        <div class="form-group">
                                            <label for="variaco">Variação do produto:&numsp;</label>
                                            <select id="variacao" name="variacao" class="form-control">
                    ';

            if (isset($resultado) && $resultado != null && $resultado != '0') {
                foreach ($resultado as $variacao) {
                    $nomeVariacao = urldecode($variacao['nome']);
                    echo '<option value="' . $nomeVariacao . '">' . $nomeVariacao . '</option>';
                }
            }

            echo '
                                            </select>
                                        </div>&numsp;
                    ';

            $_POST['listar'] = true;
            include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCategoria/categorias.php';

            echo '
                                        <div class="form-group">
                                            <label for="categoria">Categoria do produto:&numsp;</label>
                                            <select id="categoria" name="categoria" class="form-control">
                    ';

            if (isset($resultado) && $resultado != null && $resultado != '0') {
                foreach ($resultado as $categoria) {
                    $categoria = urldecode($categoria['descricao']);
                    echo '<option value="' . $categoria . '">' . $categoria . '</option>';
                }
            }

            echo '
                                            </select>
                                        </div>&numsp;
                    ';

            $_POST['listar'] = true;
            include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDSubCategoria/subcategorias.php';

            echo '
                                        <div class="form-group">
                                            <label for="subcategoria">Sub-categoria do produto:&numsp;</label>
                                            <select id="subcategoria" name="subcategoria" class="form-control">
                                                
                    ';

            if (isset($resultado) && $resultado != null && $resultado != '0') {
                foreach ($resultado as $subcategoria) {
                    $subcategoria = urldecode($subcategoria['subdescricao']);
                    echo '<option value="' . $subcategoria . '">' . $subcategoria . '</option>';
                }
            }

            echo '
                                            </select>
                                        </div>
                                    </div>
                    ';

            echo '
                                    <hr>
                                  
                                    <div class="form-group">
                                        <label for="fotoPrincipal">Foto principal:</label><small><sup style="color: red"> *</sup></small>&numsp;
                                        <input type="file" id="fotoPrincipal" name="fotoPrincipal" accept="image/*" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Fotos adicionais</label>
                                        <div class="form-group form-inline">
                                            <div>
                                                <input type="file" id="foto2" name="foto2" accept="image/*">
                                            </div>
                                            <div>
                                                <input type="file" id="foto3" name="foto3" accept="image/*">
                                            </div>
                                            <div>
                                                <input type="file" id="foto4" name="foto4" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" form="cadProd" id="submitProduto" name="submitProduto" class="btn btn-primary">Cadastrar</button>
                                    <button type="reset" form="cadProd" id="resetProduto" name="resetProduto" class="btn btn-secondary">Limpar</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    ';

        }
    }

    public function listarProdutos()
    {

        if (isset($_GET['search']) && $_GET['search'] != null) {
            include $_SERVER['DOCUMENT_ROOT'] . "/site/control/CRUDProduto/produtos.php";

            if (isset($resultado) && $resultado != null && $resultado != '0') {
                echo '
                
                <div class="modal-content" style="padding: 1%">
                    <a href="http://localhost/site/view/dashboard/produto/cad_prod.php" class="btn btn-outline-primary" style="width: 15%; margin-bottom: 2%">Cadastrar Produto</a>
                    <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Produtos
                        <div class="row">
                                <form id="buscarProduto" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="ID, titulo, descrição, marca, SKU ou EAN" value="' . urldecode($busca). '" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" form="buscarProduto">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="User_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>SKU / EAN</th>
                                        <th>Marca</th>
                                        <th>Frete</th>
                                        <th>Destaque</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>SKU / EAN</th>
                                        <th>Marca</th>
                                        <th>Frete</th>
                                        <th>Destaque</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                </div>
                
            ';

                $number = 0;
                $fretegratis = "Frete grátis";
                $fretepago = "Pago pelo cliente";
                foreach ($resultado as $resul) {
                    $number++;

                    echo '
                    <tr id="User_row' . $number . '">
                        <td class="id_val">' . $resul['id'] . '</td>
                        <td class="produtoTitulo">' . urldecode($resul['titulo']) . '</td>
                        <td class="produtoPreco"> ' . (($resul['preco_promo'] >= 0) ? '<small style="text-decoration: line-through; color: gray;">R$' . number_format($resul['preco'], 2, ',', '.') . '</small> R$' . number_format($resul['preco_promo'], 2, ',', '.') : 'R$' . number_format($resul['preco'], 2, ',', '.')) . '</td>
                        <td class="produtoSKU_EAN">' . urldecode($resul['sku_ean']) . '</td>
                        <td class="produtoMarca">' . urldecode($resul['marca']) . '</td>
                        <td class="produtoEntrega">' . (($resul['entrega'] == 0) ? $fretepago : $fretegratis) . '</td>
                        <td class="destaqueProd">' . (($resul['destaque'] == 0) ? '<i class="far fa-star"></i>' : '<i class="fas fa-star"></i>') . '</td>
                        <td class="text-center"><a href="http://localhost/site/view/dashboard/produto/cad_prod.php?produto=' . $resul['id'] . '&action=edit"><button class="btn btn-warning" id="alterar" name="alterar">Alterar</button></a></td>
                        <td class="text-center"><button class="btn btn-outline-danger" id="excluir" name="excluir" value="' . $number . '">Excluir</button></td>
                    </tr>
                ';
                }

                echo '
        
                </tbody></table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Atualizado as ' . date("H:i:s") . '</div>
                </div>
        
            ';
            }



        }else{

            $_POST['listar'] = true;
            include $_SERVER['DOCUMENT_ROOT'] . "/site/control/CRUDProduto/produtos.php";

            if (isset($resultado) && $resultado != null && $resultado != '0') {
                echo '
                
                <div class="modal-content" style="padding: 1%">
                    <a href="http://localhost/site/view/dashboard/produto/cad_prod.php" class="btn btn-outline-primary" style="width: 15%; margin-bottom: 2%">Cadastrar Produto</a>
                    <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Produtos
                        <div class="row">
                                <form id="buscarProduto" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="ID, titulo, SKU ou EAN" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" form="buscarProduto">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="User_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>SKU / EAN</th>
                                        <th>Marca</th>
                                        <th>Frete</th>
                                        <th>Destaque</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>SKU / EAN</th>
                                        <th>Marca</th>
                                        <th>Frete</th>
                                        <th>Destaque</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                </div>
                
            ';

                $number = 0;
                $fretegratis = "Frete grátis";
                $fretepago = "Pago pelo cliente";
                foreach ($resultado as $resul) {
                    $number++;

                    echo '
                    <tr id="User_row' . $number . '">
                        <td class="id_val">' . $resul['id'] . '</td>
                        <td class="produtoTitulo">' . urldecode($resul['titulo']) . '</td>
                        <td class="produtoPreco"> ' . (($resul['preco_promo'] >= 0) ? '<small style="text-decoration: line-through; color: gray;">R$' . number_format($resul['preco'], 2, ',', '.') . '</small> R$' . number_format($resul['preco_promo'], 2, ',', '.') : 'R$' . number_format($resul['preco'], 2, ',', '.')) . '</td>
                        <td class="produtoSKU_EAN">' . urldecode($resul['sku_ean']) . '</td>
                        <td class="produtoMarca">' . urldecode($resul['marca']) . '</td>
                        <td class="produtoEntrega">' . (($resul['entrega'] == 0) ? $fretepago : $fretegratis) . '</td>
                        <td class="destaqueProd">' . (($resul['destaque'] == 0) ? '<i class="far fa-star"></i>' : '<i class="fas fa-star"></i>') . '</td>
                        <td class="text-center"><a href="http://localhost/site/view/dashboard/produto/cad_prod.php?produto=' . $resul['id'] . '&action=edit"><button class="btn btn-warning" id="alterar" name="alterar">Alterar</button></a></td>
                        <td class="text-center"><button class="btn btn-outline-danger" id="excluir" name="excluir" value="' . $number . '">Excluir</button></td>
                    </tr>
                ';
                }

                echo '
        
                </tbody></table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Atualizado as ' . date("H:i:s") . '</div>
                </div>
        
            ';

            } else {
                echo '<tr><td>Nenhuma Categoria Cadastrada</td></tr>';
            }
        }


    }
}