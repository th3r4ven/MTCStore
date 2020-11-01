<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 15:56
 */

class DisplayCRUDSubCategoria{

    public function formSubCategoria(){

        $_POST['listar'] = true;
        //a variavel resultado vem desse arquivo categorias.php
        include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCategoria/categorias.php';

        echo '
        
                <div class="content-block">
                    <h1 id="titulo">Cadastrar Sub-Categoria</h1>
                    <div class="modal-content" style="padding: 1%">
                        <form id="formSubCategoria" action="" method="post" autocomplete="off">
                            <div style="padding: 1%">
                            <div class="form-group" id="idformSubCategoria"><label for="idSubCategoria">ID</label><input type="text" id="idSubCategoria" name="idSubCategoria" class="form-control" readonly></div>
                                <div class="form-group">
                                    <label for="nomeSubCategoria">Nome da variação</label><small><sup style="color: red"> * </sup></small>
                                    <input type="text" class="form-control" id="nomeSubCategoria" name="nomeSubCategoria" autocomplete="off" placeholder="Camisa Algodão, Celular, Freezer, etc..." required style="width: 50%;">
                                </div>
                                
                                <div class="form-group">
                                    <label for="descricaoCategoria">Categoria Descendente</label><small><sup style="color: red"> * </sup></small>
                                    <select class="form-control" name="descricaoCategoria" id="descricaoCategoria">
                                    <option selected>Selecione uma categoria</option>
        ';
                                    foreach ($resultado as $categoria){
                                        $descricao = urldecode($categoria['descricao']);
                                        echo '<option value="' . $descricao . '">' . $descricao . '</option>';
                                    }
        echo '
                                    </select>
                                </div>
                                
                                <button type="submit" form="formSubCategoria" id="submitSubCategoria" name="submitSubCategoria" class="btn btn-primary">Cadastrar</button>
                                <button type="button" form="formSubCategoria" id="alterarSubCategoria" name="alterarSubCategoria" class="btn btn-warning">Alterar</button>
                                <button type="reset" form="formSubCategoria" id="resetSubCategoria" name="resetSubCategoria" class="btn btn-secondary">Limpar</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
        
        ';

    }

    public function listarSubCategoria(){
        $_POST['listar'] = true;
        include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDSubCategoria/subcategorias.php';

        if(isset($resultado) && $resultado != null && $resultado != '0'){
            echo '
                
                <div class="modal-content" style="padding: 1%">
                    <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Sub-categorias
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="User_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome da Sub-categoria</th>
                                        <th>Categoria decendente</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome da Sub-categoria</th>
                                        <th>Categoria decendente</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                </div>
                
            ';

            $number = 0;
            foreach ($resultado as $resul) {
                $number ++;
                echo '
                    <tr id="User_row' . $number . '">
                        <td class="id_val">' . $resul['id'] . '</td>
                        <td class="descricaoSubCategoria">' . urldecode($resul['subdescricao']) . '</td>
                        <td class="descricaoCategoriatable">' . urldecode($resul['descricao']) . '</td>
                        <td class="text-center"><button class="btn btn-warning" id="alterar" name="alterar" value="'. $number .'">Alterar</button></td>
                        <td class="text-center"><button class="btn btn-outline-danger" id="excluir" name="excluir" value="'. $number .'">Excluir</button></td>
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

        }else{
            echo '
                <div class="content-block">
                    <h1>Listar Sub-Categorias</h1>
                    <div class="modal-content" style="padding: 1%">
                        Nenhuma Sub-categoria cadastrada
                    </div>
                </div>
            ';
        }

    }

}