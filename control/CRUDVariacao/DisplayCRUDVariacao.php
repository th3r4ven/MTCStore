<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 02/01/2020
 * Time: 13:28
 */

class DisplayCRUDVariacao{

    public function formCadastroVariacao(){

        echo '
        
                <div class="content-block">
                    <h1 id="titulo">Cadastrar Variações</h1>
                    <div class="modal-content" style="padding: 1%">
                        <form id="formVariacao" action="" method="post" autocomplete="off">
                            <div style="padding: 1%">
                            <div class="form-group" id="idVariacao"><label for="idVariacao">ID</label><input type="text" id="idVariacao" name="idVariacao" class="form-control" readonly></div>
                                <div class="form-group">
                                    <label for="nomeVariacao">Nome da variação</label>
                                    <input type="text" class="form-control" id="nomeVariacao" name="nomeVariacao" autocomplete="off" placeholder="Cor, Tamanho, Marca, etc..." required style="width: 50%;">
                                </div>
                                
                                <div class="form-group">
                                    <label for="tiposVariacao">Variações</label><small><sup style="color: red"> * </sup></small><span>&numsp;<small>Separe os atributos com | .</small></span>
                                    <textarea class="form-control" name="tiposVariacao" id="tiposVariacao" cols="20" rows="2" placeholder="PP | P | M | G | GG"></textarea>
                                </div>
                                
                                <button type="submit" form="formVariacao" id="submitVariacao" name="submitVariacao" class="btn btn-primary">Cadastrar</button>
                                <button type="button" form="formVariacao" id="alterarVariacao" name="alterarVariacao" class="btn btn-warning">Alterar</button>
                                <button type="reset" form="formVariacao" id="resetVariacao" name="resetVariacao" class="btn btn-secondary">Limpar</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
        
        ';

    }

    public function listarVariacoes(){
        $_POST['listar'] = true;
        include $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDVariacao/variacoes.php';

        if(isset($resultado) && $resultado != null && $resultado != '0'){
            echo '
                
                <div class="modal-content" style="padding: 1%">
                    <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Variações
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="User_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome da variação</th>
                                        <th>Variações</th>
                                        <th style="width: 10%">Alterar</th>
                                        <th style="width: 10%">Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome da variação</th>
                                        <th>Variações</th>
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
                        <td class="nomeVariacao">' . urldecode($resul['nome']) . '</td>
                        <td class="tiposVariacao">' . urldecode($resul['tipos']) . '</td>
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
            echo '<tr><td>Nenhuma Variação Cadastrada</td></tr>';
        }

    }

}