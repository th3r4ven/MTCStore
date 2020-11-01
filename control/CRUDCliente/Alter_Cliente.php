<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 20/12/2019
 * Time: 14:34
 */

/**
 * This file is called to process the client ID and include the function that display the form to change the client data
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/CRUDCliente/displayCRUDcliente.php';
$alterar = new displayCRUDcliente();

if(isset($_GET['id_cliente']) && $_GET['action'] == "edit"){
    $id_cliente = $_GET['id_cliente'];

    $alterar->AlterCliente($id_cliente);

}else{

    echo "Não Foi possivel obter o ID do cliente ou a ação desejada, tente novamente";
}


