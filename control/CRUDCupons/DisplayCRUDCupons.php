<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 23/12/2019
 * Time: 16:02
 */


/**
 * Class DisplayCRUDCupons
 *
 * This class is responsible for displaying the forms on the front-end.
 */
class DisplayCRUDCupons{


    public function Form_Cupons(){

        echo '
                
                <div class="modal-content" style="padding: 1%">
                
                    <form id="FormCupons" action="" method="post" autocomplete="off">
                    
                        <input type="hidden" id="CuponID" name="CuponID">
                        
                        <div class="form-inline">
                            <label for="CuponDescription" class="form-label-group">Codigo do Cupon:&numsp;</label>
                            <input type="text" class="form-control" id="CuponDescription" name="CuponDescription" maxlength="25" placeholder="15OFF" style="width: 30%;" required>
                        </div>
                        
                        <div class="form-inline" style="margin-top: 1%">
                            <label for="CuponDiscount">Porcentagem de desconto:&numsp;</label>
                            <input type="number" class="form-control" id="CuponDiscount" name="CuponDiscount" placeholder="10" min="1" max="100" style="width: 10%" required>
                        </div>
                        <div class="form-inline" style="margin-top: 1%">
                            <button type="submit" form="FormCupons" class="btn btn-primary" id="submitCupons" name="submitCupons" style="margin-right: 1%">Cadastrar</button>
                            <button type="button" form="FormCupons" class="btn btn-warning" id="alterarCupons" name="alterarCupons" style="margin-right: 1%">Alterar</button>
                            <button type="reset" form="FormCupons" class="btn btn-secondary" id="resetCupons" name="resetCupons">Limpar</button>
                        </div>
                    </form>
                
                </div>
                
            ';


    }

    public  function List_Cupons(){

        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCupon/SELECT_Cupon.php';
        $select = new SELECT_Cupon();
        $select->conexao = conexao::conect();

        $resultado = $select->ListCupons();

        if(isset($resultado) && $resultado != null && $resultado != '0'){
            echo '
                
                <div class="modal-content" style="padding: 1%">
                    <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Cupons</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="User_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Codigo do Cupon</th>
                                        <th>Porcentagem de Desconto</th>
                                        <th>Alterar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Codigo do Cupon</th>
                                        <th>Porcentagem de Desconto</th>
                                        <th>Alterar</th>
                                        <th>Excluir</th>
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
                        <td class="id_val">' . urldecode($resul['id']) . '</td>
                        <td class="cuponCode_val">' . urldecode($resul['codigo_cupon']) . '</td>
                        <td class="porcentagemDesconto_val">' . urldecode($resul['porcentagem_desconto']) . '%</td>
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
            echo '<tr><td>Nenhum Cupom Cadastrado</td></tr>';
        }

        conexao::FechaConexao($select->conexao);

    }


}