<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 17/12/2019
 * Time: 10:46
 */

/**
 * Class displayCRUDcliente
 *
 * This class is responsible for displaying the forms on the front-end.
 */
class displayCRUDcliente{


    public function displayFormCadastro(){

        echo '
        
            <div class="content-block">
                <h1>Cadastrar cliente</h1>
            
                <div class="modal-content">
            
                    <form id="formCliente" action="" method="post" autocomplete="off">
                        <div style="padding: 1%">
                            <div class="form-group">
                                <label for="">Nome do Cliente: </label><small><sup style="color: red"> *</sup></small>
                                <div class="form-inline">
                                    <input class="form-control" type="text" id="firstName" autocomplete="off" name="firstName" placeholder="Nome" style="width: 35%; margin-right: 1%" required>
                                    <input class="form-control" type="text" id="lastName" autocomplete="off" name="lastName" placeholder="Sobrenome" style="width: 35%" required>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label for="emailCliente">Email: </label><small><sup style="color: red"> *</sup></small>
                                <input class="form-control" type="email" id="emailCliente" name="emailCliente" placeholder="exemplo@gmail.com" autocomplete="off" required style="width: 30%">
                            </div>
            
                            <div class="form-group">
                                 <label for="cpfCliente">CPF: </label><small><sup style="color: red"> * </sup></small><span><small>Somente números</small></span>
                                 <input class="form-control" type="text" id="cpfCliente" autocomplete="off" name="cpfCliente" onkeypress="formatar(\'###.###.###-##\', this)" minlength="14" maxlength="14" placeholder="999.999.999-99" style="width: 10%" required>
                            </div>
            
                            <div class="form-group">
                                <label for="birthCliente">Data de nascimento: </label><small><sup style="color: red"> * </sup></small>
                                <input class="form-control" type="text" id="birthCliente" autocomplete="off" name="birthCliente" onkeypress="formatar(\'##/##/####\', this)" minlength="10" maxlength="10" placeholder="01/01/2000" style="width: 10%" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phoneCliente">Telefone: </label><small><sup style="color: red"> * </sup></small><small>Com DDD sem 0</small></span>
                                <input class="form-control" type="text" id="phoneCliente" autocomplete="off" name="phoneCliente" onkeypress="formatar(\'##-#####-####\', this)" minlength="13" maxlength="13" placeholder="11-98403-6412" style="width: 15%" required>
                            </div>
            
                            <div class="form-group">
                                <label for="">Endereço de entrega do cliente </label><small><sup style="color: red"> * </sup></small><span><small>Preencha todos os campos</small></span>
                                <input class="form-control" type="text" id="CEPCliente" name="CEPCliente" placeholder="CEP de entrega" maxlength="9" onkeypress="formatar(\'#####-###\', this)" style="width: 10%; margin-bottom: 1%;" required>
                                <div class="form-inline" style="margin-bottom: 1%">
                                    <input class="form-control" type="text" id="enderecoCliente" name="enderecoCliente" placeholder="Rua A" style="width: 30%; margin-right: 1%;" required>
                                    <input class="form-control" type="text" id="numeroCliente" name="numeroCliente" placeholder="Número" style="width: 10%" required>
                                    <label for="estadoCliente">&numsp;Estado:&numsp;</label>
                                    <input class="form-control" type="text" id="estadoCliente" name="estadoCliente" placeholder="SP" style="width: 10%" required>
                                </div>
                                <div class="form-inline">
                                    <input class="form-control" type="text" id="bairroCliente" name="bairroCliente" placeholder="Bairro" style="width: 30%; margin-right: 1%">
                                    <input class="form-control" type="text" id="cidadeCliente" name="cidadeCliente" placeholder="Cidade" style="width: 30%" required>
                                </div>
                            </div>
            
                            <button type="submit" form="formCliente" id="submitCliente" name="submitCliente" class="btn btn-primary">Cadastrar</button>
                            <button type="reset" form="formCliente" id="resetCliente" name="resetCliente" class="btn btn-outline-secondary">Limpar</button>
                        </div>
                    </form>
                    <script>
            
                        function formatar(mascara, documento){
                            var i = documento.value.length;
                            var saida = mascara.substring(0,1);
                            var texto = mascara.substring(i);
            
                            if (texto.substring(0,1) != saida){
                                documento.value += texto.substring(0,1);
                            }
            
                        }
                    </script>
                </div>
            </div>
        
        ';

    }


    public function ListCliente(){


        if(isset($_GET['search']) && $_GET['search'] != null){
            include $_SERVER['DOCUMENT_ROOT'] . "/site/control/CRUDCliente/clientes.php";

            if(isset($resultado) && $resultado != null && $resultado != '0'){

                echo '
            <div class="content-block">
                <h1>Clientes</h1>
        
                <div class="modal-content">
        
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Clientes cadastrados
                            <div class="row">
                                <form id="searchCliente" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="ID, Nome, Email, CEP, CPF" value="' . urldecode($busca) . '" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" form="searchCliente">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                            
                        <div class="card-body" style="padding-top: 1%">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="Cliente_data" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome do cliente</th>
                                        <th>Email</th>
                                        <th>CPF</th>
                                        <th>Ações</th>
                                        <th>Excluir</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome do cliente</th>
                                        <th>Email</th>
                                        <th>CPF</th>
                                        <th>Ações</th>
                                        <th>Excluir</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                ';
                $number = 0;
                foreach ($resultado as $resul) {
                    $number ++;

                    echo '
                    <tr id="User_row' . $number . '">
                        <td class="id">' . urldecode($resul['id']) . '</td>
                        <td class="fullname_val">' . urldecode($resul['nome']) . '</td>
                        <td class="email_val">' . urldecode(base64_decode($resul['email'])) . '</td>
                        <td class="cpf_val">' . base64_decode($resul['cpf']) . '</td>
                        <td class="text-center"><a href="http://localhost/site/view/dashboard/usuarios/edit_cliente.php?id_cliente='. urldecode($resul['id']) . '&action=edit"><button class="btn btn-outline-primary" id="alterar" name="alterar">Visualizar</button></a></td>
                        <td class="text-center"><button class="btn btn-outline-danger" id="excluir" name="excluir" value="' . $number . '">Excluir</button></td>
                    </tr>
                ';
                }

                echo '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Atualizado as ' . date("H:i:s") . '</div>
                    </div>
        
        
                </div>
            </div>';

            }

        }else{
            $_POST['listar'] = true;
            include $_SERVER['DOCUMENT_ROOT'] . "/site/control/CRUDCliente/clientes.php";

            if(isset($resultado) && $resultado != null && $resultado != '0'){
                echo '
            <div class="content-block">
                <h1>Clientes</h1>
        
                <div class="modal-content">
        
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Clientes cadastrados
                            <div class="row">
                                <form id="searchCliente" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="ID, Nome, Email, CEP, CPF" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" form="searchCliente">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                            
                        <div class="card-body" style="padding-top: 1%">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="Cliente_data" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome do cliente</th>
                                        <th>Email</th>
                                        <th>CPF</th>
                                        <th>Ações</th>
                                        <th>Excluir</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome do cliente</th>
                                        <th>Email</th>
                                        <th>CPF</th>
                                        <th>Ações</th>
                                        <th>Excluir</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                ';
                $number = 0;
                foreach ($resultado as $resul) {
                    $number ++;

                    echo '
                    <tr id="User_row' . $number . '">
                        <td class="id">' . urldecode($resul['id']) . '</td>
                        <td class="fullname_val">' . urldecode($resul['nome']) . '</td>
                        <td class="email_val">' . urldecode(base64_decode($resul['email'])) . '</td>
                        <td class="cpf_val">' . base64_decode($resul['cpf']) . '</td>
                        <td class="text-center"><a href="http://localhost/site/view/dashboard/usuarios/edit_cliente.php?id_cliente='. urldecode($resul['id']) . '&action=edit"><button class="btn btn-outline-primary" id="alterar" name="alterar">Visualizar</button></a></td>
                        <td class="text-center"><button class="btn btn-outline-danger" id="excluir" name="excluir" value="' . $number . '">Excluir</button></td>
                    </tr>
                ';
                }

                echo '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Atualizado as ' . date("H:i:s") . '</div>
                    </div>
        
        
                </div>
            </div>';
            }

        }

    }


    public function AlterCliente($id_cliente){


        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/conexao/conexao.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCliente/SELECT_Cliente.php';
        $editar = new SELECT_Cliente();
        $editar->conexao = conexao::conect();

        $resultado = $editar->SelectUniqueCLiente($id_cliente);

        if($resultado != null){

            foreach ($resultado as $resul){
                $resul['nome'] = urldecode($resul['nome']);
                $nome_dividido = explode(' ',$resul['nome'], 2);
                $email = urldecode($resul['email']);
                $cpf = urldecode($resul['cpf']);
                $data_nascimento = urldecode($resul['data_nascimento']);
                $tel = urldecode($resul['telefone']);
                $cep = urldecode($resul['cep']);
                $endereco = urldecode($resul['endereco']);
                $numero = urldecode($resul['numero']);
                $estado = urldecode($resul['estado']);
                $bairro = urldecode($resul['bairro']);
                $cidade = urldecode($resul['cidade']);

                echo '
        
            <div class="content-block">
                <h1>Editar cliente</h1>
            
                <div class="modal-content">
            
                    <form id="formCliente" action="" method="post" autocomplete="off">
                        <div style="padding: 1%">
                            <div class="form-group">
                                <input type="hidden" id="id_cliente" name="id_cliente" value="' . $resul['id'] . '">
                            
                                <label for="">Nome do Cliente: </label><small><sup style="color: red"> *</sup></small>
                                <div class="form-inline">
                                    <input class="form-control" type="text" id="firstName" autocomplete="off" name="firstName" placeholder="Nome" style="width: 35%; margin-right: 1%" required value="' . $nome_dividido[0] . '">
                                    <input class="form-control" type="text" id="lastName" autocomplete="off" name="lastName" placeholder="Sobrenome" style="width: 35%" required value="'. $nome_dividido[1] .'">
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label for="emailCliente">Email: </label><small><sup style="color: red"> *</sup></small>
                                <input class="form-control" type="email" id="emailCliente" name="emailCliente" placeholder="exemplo@gmail.com" autocomplete="off" required style="width: 30%" value="' . $email . '">
                            </div>
            
                            <div class="form-group">
                                 <label for="cpfCliente">CPF: </label><small><sup style="color: red"> * </sup></small><span> <small>Somente números</small></span>
                                 <input class="form-control" type="text" id="cpfCliente" autocomplete="off" name="cpfCliente" onkeypress="formatar(\'###.###.###-##\', this)" minlength="14" maxlength="14" placeholder="999.999.999-99" style="width: 10%" required value="' . $cpf . '">
                            </div>
            
                            <div class="form-group">
                                <label for="birthCliente">Data de nascimento: </label><small><sup style="color: red"> * </sup></small>
                                <input class="form-control" type="text" id="birthCliente" autocomplete="off" name="birthCliente" onkeypress="formatar(\'##/##/####\', this)" minlength="10" maxlength="10" placeholder="01/01/2000" style="width: 10%" required value="' . $data_nascimento . '">
                            </div>
                            
                            <div class="form-group">
                                <label for="phoneCliente">Telefone: </label><small><sup style="color: red"> * </sup></small><small>Com DDD sem 0</small></span>
                                <input class="form-control" type="text" id="phoneCliente" autocomplete="off" name="phoneCliente" onkeypress="formatar(\'##-#####-####\', this)" minlength="13" maxlength="13" placeholder="11-99999-9999" style="width: 15%" required value="'. $tel . '">
                            </div>
            
                            <div class="form-group">
                                <label for="">Endereço de entrega do cliente </label><small><sup style="color: red"> * </sup></small><span><small>Preencha todos os campos</small></span>
                                <input class="form-control" type="text" id="CEPCliente" name="CEPCliente" placeholder="CEP de entrega" maxlength="9" onkeypress="formatar(\'#####-###\', this)" style="width: 10%; margin-bottom: 1%;" required value="' . $cep . '">
                                <div class="form-inline" style="margin-bottom: 1%">
                                    <input class="form-control" type="text" id="enderecoCliente" name="enderecoCliente" placeholder="Rua A" style="width: 30%; margin-right: 1%;" required value="' . $endereco . '">
                                    <input class="form-control" type="text" id="numeroCliente" name="numeroCliente" placeholder="Número" style="width: 10%" required value="' . $numero . '">
                                    <label for="estadoCliente">&numsp;Estado:&numsp;</label>
                                    <input class="form-control" type="text" id="estadoCliente" name="estadoCliente" placeholder="SP" style="width: 10%" required maxlength="2" value="' . $estado . '">
                                </div>
                                <div class="form-inline">
                                    <input class="form-control" type="text" id="bairroCliente" name="bairroCliente" placeholder="Bairro" style="width: 30%; margin-right: 1%" value="' . $bairro . '">
                                    <input class="form-control" type="text" id="cidadeCliente" name="cidadeCliente" placeholder="Cidade" style="width: 30%" required value="' . $cidade . '">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="button" id="gerar_nova_senha" name="gerar_nova_senha" class="btn btn-outline-primary">Gerar nova senha</button>
                            </div>
            
                            <button type="submit" form="formCliente" id="alterarCliente" name="alterarCliente" class="btn btn-warning">Alterar</button>
                            <button type="reset" form="formCliente" id="resetCliente" name="resetCliente" class="btn btn-outline-secondary">Limpar</button>
                        </div>
                    </form>
                    <script>
            
                        function formatar(mascara, documento){
                            var i = documento.value.length;
                            var saida = mascara.substring(0,1);
                            var texto = mascara.substring(i);
            
                            if (texto.substring(0,1) != saida){
                                documento.value += texto.substring(0,1);
                            }
            
                        }
                    </script>
                </div>
            </div>
        
        ';
            }
        }
    }
}
