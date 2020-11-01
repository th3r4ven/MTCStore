<?php
/**
 * Created by PhpStorm.
 * User: HACKCR0W
 * Date: 08/12/2019
 * Time: 18:53
 */

class displayCRUDadm{


    public function CadastrarUser(){

        if(isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'Administrador'){

            echo '

            <div class="modal-content">

                <form id="cadUser" action="" method="post" autocomplete="off">
                    
                    <div style="padding: 1%">
                        <div id="IDuser" class="form-group form-inline">
                            <label for="username" style="margin-right: 1%">ID: </label>
                            <input class="form-control form-control-sm" type="text" id="userID" name="userID" style="width: 10%" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Username: </label>
                            <input class="form-control" type="text" id="username" autocomplete="off" name="username" placeholder="Nickname" style="width: 35%">
                        </div>
                        
                        <div class="form-group">
                            <label for="useremail">Email: </label><small><sup style="color: red"> *</sup></small>
                            <input class="form-control" type="email" id="useremail" name="useremail" placeholder="exemplo@gmail.com" autocomplete="off" required style="width: 40%">        
                        </div>
                        
                        <div class="form-group admin_div">
                            <label for="admin_type">Nível administrativo: </label><small><sup style="color: red"> *</sup></small>
                            <select id="admin_type" class="form-control" required style="width: 15%">
                                <option value="Administrador">Administrador</option>
                                <option value="Gerente">Gerente</option>
                            </select>
                        </div>
                        
                        <div class="form-group divSenha">
                            <label for="userkey">Senha: </label><small><sup style="color: red"> *</sup></small>
                            <input class="form-control" type="password" id="userkey" name="userkey" autocomplete="off" required max="20" placeholder="************" style="width: 35%">
                        </div>
            
                        <button type="submit" form="cadUser" id="submitCadUser" name="submitCadUser" class="btn btn-primary">Cadastrar</button>
                        <button type="submit" form="cadUser" id="alterarUser" name="alterarUser" class="btn btn-warning">Alterar Usuário</button>
                        <button type="reset" form="cadUser" id="resetCadUser" name="resetCadUSer" class="btn btn-outline-secondary">Limpar</button>
                    </div>
                </form>
            </div>' ;

        }else{
            echo 'Sua conta não tem permissão para cadastrar usuários';
        }


    }


    public function ListUsers()
    {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDuser/listUser.php';
        $listar = new listUser();
        $listar->conexao = conexao::conect();


        $resultado = $listar->ListarUsers();


        if ($_SESSION['UserType'] == 'Administrador') {
            echo '<div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Usuários cadastrados</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="User_data" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome de usuário</th>
                                    <th>Email</th>
                                    <th>Nível ADM.</th>
                                    <th>Alterar</th>
                                    <th>Excluir</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome de usuário</th>
                                    <th>Email</th>
                                    <th>Nível ADM.</th>
                                    <th>Alterar</th>
                                    <th>Excluir</th>
                                </tr>
                                </tfoot><tbody>';
            $number = 0;
            foreach ($resultado as $resul) {
                $number ++;
                if($resul['id'] != $_SESSION['UserID']){
                    echo '
                                <tr id="User_row' . $number . '">
                                    <td class="id_val">' . urldecode($resul['id']) . '</td>
                                    <td class="username_val">' . urldecode($resul['username']) . '</td>
                                    <td class="email_val">' . urldecode($resul['email']) . '</td>
                                    <td class="adm_val">' . $resul['user_type'] . '</td>
                                    <td class="text-center"><button class="btn btn-warning" id="alterar" name="alterar" value="' . $number . '">Alterar</button></td>
                                    <td class="text-center"><button class="btn btn-outline-danger" id="excluir" name="excluir" value="' . $number . '">Excluir</button></td>
                                </tr>
                            ';
                }
            }
            echo '</tbody></table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Atualizado as ' . date("H:i:s") . '</div>
                </div>';
        } else {

            echo '<div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Data Table Example</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome de usuário</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome de usuário</th>
                                    <th>Email</th>
                                </tr>
                                </tfoot>';

            foreach ($resultado as $resul) {

                echo '
                                <tbody>
                                <tr>
                                    <td>' . urldecode($resul['id']) . '</td>
                                    <td>' . urldecode($resul['username']) . '</td>
                                    <td>' . urldecode($resul['email']) . '</td>
                                </tr>

                                </tbody>
                            ';
            }
            echo '</table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Atualizado as ' . date("H:i:s") . '</div>
                </div>';
        }

        conexao::FechaConexao($listar->conexao);
    }

}