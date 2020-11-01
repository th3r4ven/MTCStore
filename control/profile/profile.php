<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 09/12/2019
 * Time: 11:17
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/profile/showProfile.php';
$profile = new showProfile();

function exibirPerfil(){

    if(isset($_SESSION['UserID'])) {
        global $profile;
        $profile->conexao = conexao::conect();
        $resultado = $profile->personalProfile($_SESSION['UserID']);

        if ($resultado == '0' || $resultado == null || !isset($resultado)) {
            echo '0';
        } else {
            foreach ($resultado as $resul){
                $username = urldecode($resul['username']);
                $email = urldecode($resul['email']);
                $user_type = $resul['user_type'];

                echo '<div class="modal-content">

                <form id="profile" action="" method="post" autocomplete="off">
                    
                    <div style="padding: 1%">
                        <div id="IDuser" class="form-group form-inline">
                            <label for="username" style="margin-right: 1%">ID: </label>
                            <input class="form-control form-control-sm" 
                            type="text" id="userID" 
                            name="userID" value="' . $resul['id'] . '" 
                            style="width: 10%" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Username: </label>
                            <input 
                            class="form-control" type="text" id="username" 
                            autocomplete="off" name="username" 
                            placeholder="Nickname" style="width: 35%" 
                            value="' . $username . '">
                        </div>
                        
                        <div class="form-group">
                            <label for="useremail">Email: </label><small><sup style="color: red"> *</sup></small>
                            <input 
                            class="form-control" type="email" 
                            id="useremail" name="useremail" 
                            placeholder="exemplo@gmail.com" autocomplete="off" 
                            required style="width: 40%"
                            value="'. $email . '">
                        </div>
                        
                        <div class="form-group admin_div">
                            <label for="admin_type">Nível administrativo: </label><small><sup style="color: red"> *</sup></small>
                            <select id="admin_type" class="form-control" required style="width: 15%" readonly>
                                <option value="'. $user_type . '">' . $user_type . '</option>
                            </select>
                        </div>
                        
                        <hr>
                        
                        <button type="submit" class="btn btn-primary" id="alterar_senha" name="alterar_senha" >Alterar senha?</button>
                        <button type="submit" class="btn btn-secondary" id="nao_alterar_senha" name="nao_alterar_senha">Cancelar</button><br><br>
                        
                        <div class="alterar_senha">
                            <div class="form-group divSenha">
                                <label for="userkey">Nova senha : </label>
                                <input class="form-control" type="password" id="userkey" name="userkey" autocomplete="off" max="20" placeholder="************" style="width: 35%">
                            </div>
                            
                            <div class="form-group divSenha">
                                <label for="userkeyconfirm">Confirmar nova senha : </label>
                                <input class="form-control" type="password" id="userkeyconfirm" name="userkeyconfirm" autocomplete="off" max="20" placeholder="************" style="width: 35%">
                            </div>
                        
                        </div>
            
                        <button type="submit" form="cadUser" id="alterarUser" name="alterarUser" class="btn btn-warning">Atualizar Informações</button>
                    </div>
                </form>
            </div>';
            }
        }
        conexao::FechaConexao($profile->conexao);
    }else{
        echo 'Erro ao obter o ID do usuário logado';
    }



}
