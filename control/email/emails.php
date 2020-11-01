<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 18/12/2019
 * Time: 10:33
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/site_meta/info.php';

function cadastro_cliente($email_destino, $senha){

    global $site_name;
    global $site_email;

    // emails para quem será enviado o formulário
    $destino = $email_destino;
    $assunto = "Cadastro no site " . $site_name;

    // É necessário indicar que o formato do e-mail é html
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: ' . $site_name . '<' . $site_email . '>';
    //$headers .= "Bcc: $EmailPadrao\r\n";

    // Corpo E-mail
    $arquivo = "
                  <style type='text/css'>
                  body {
                  margin:0px;
                  font-family: Verdane,sans-serif;
                  font-size:12px;
                  color: #666666;
                  }
                  a{
                  color: #666666;
                  text-decoration: none;
                  }
                  a:hover {
                  color: #FF0000;
                  text-decoration: none;
                  }
                  </style>
                    <html lang='pt-br'>
                    
                    <h1>Obrigado por se cadastrar no ". $site_name . "!</h1>
                    <h2>Sua conta foi criada com sucesso!.</h2>
                    <h3>Atraves da sua conta você pode acompanhar seus pedidos e fazer rapidamente o checkout sem precisar preencher os dados!</h3>
                    
                    <h5>Para acessar sua conta acesse o nosso site e clique no menu \"minha conta\", após isso insira seu email e sua senha.</h5>
                        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                            <tr>
                              <td>
                                <tr>
                                  <td width='320'>E-mail:<b>&numsp;$email_destino</b></td>
                                </tr>
                                <tr>
                                  <td width='320'>Senha:<b>&numsp;$senha</b></td>
                                </tr>
                            </td>
                          </tr>
                        </table>
                    </html>
                ";

    $enviaremail = mail($destino, $assunto, $arquivo, $headers);

    if($enviaremail){
        return '1';
    } else {
        return '0';
    }
}