<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 30/11/2019
 * Time: 15:36
 */

session_start();

require_once '../../dao/conexao/conexao.php';
require '../../dao/login_usuario/selectUsuarioLogin.php';
$login = new Login_usuario();
$login->dbconec = conexao::conect();


$email = $_POST['enderecodeemail'];
$email = urlencode($email);

$senha = $_POST['senhadeentrada'];
$senha = urlencode($senha);
$senha = md5($senha);


$honeypot = array(
    'name'  => $_POST['name'],
    'email' => $_POST['email'],
);

if($honeypot['name'] == null && $honeypot['email'] == null) {


    if (isset($email) && isset($senha) && isset($_SESSION['token'])) {


        $resultado = $login->selectUsuario($email, $senha);

        if ($resultado == '0' || $resultado == null || !isset($resultado)) {
            echo '0';
        } else {
            $_SESSION['logado'] = true;
            $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp(logout time)
            $_SESSION['UserID'] = $resultado['id'];
            $resultado['username'] = urldecode($resultado['username']);
            $_SESSION['Username'] = $resultado['username'];
            $resultado['email'] = urldecode($resultado['email']);
            $_SESSION['UserEmail'] = $resultado['email'];
            $_SESSION['UserType'] = $resultado['user_type'];
            echo '1';
        }

    } else {
        echo '0';
    }

}

conexao::FechaConexao($login->dbconec);
