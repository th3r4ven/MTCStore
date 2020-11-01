<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 11:42
 */

/**
 * Class DisplayCRUDCategoria
 *
 * This class is responsible for displaying the forms on the front-end.
 */

class DisplayCRUDCategoria{



    public function formCadastroCategoria(){

        echo '
        
                <div class="content-block">
                    <h1 id="titulo">Cadastrar Categorias</h1>
                    <div class="modal-content" style="padding: 1%">
                        <form id="formCategoria" action="" method="post" autocomplete="off">
                            <div style="padding: 1%">
                            <div class="form-group" id="IDCategoria"><label for="idCategoria">ID</label><input type="text" id="idCategoria" name="idCategoria" class="form-control" readonly></div>
                                <div class="form-group">
                                    <label for="descCategoria">Nome da categoria</label>
                                    <input type="text" class="form-control" id="descCategoria" name="descCategoria" autocomplete="off" placeholder="Calças" required style="width: 50%;">
                                </div>
                                
                                <button type="submit" form="formCategoria" id="submitCategoria" name="submitCategoria" class="btn btn-primary">Cadastrar</button>
                                <button type="button" form="formCategoria" id="alterarCategoria" name="alterarCategoria" class="btn btn-warning">Alterar</button>
                                <button type="reset" form="formCategoria" id="resetCategoria" name="resetCategoria" class="btn btn-secondary">Limpar</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
        
        ';

    }

    public function listarCategorias(){
        $_POST['listar'] = true;
        include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCategoria/categorias.php';

        if(isset($resultado) && $resultado != null && $resultado != '0'){
            echo '
                
                <div class="modal-content" style="padding: 1%">
                    <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Categorias
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="User_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome da categoria</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome da categoria</th>
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
                        <td class="descCategoria">' . urldecode($resul['descricao']) . '</td>
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
            echo '<tr><td>Nenhuma Categoria Cadastrada</td></tr>';
        }

    }

}