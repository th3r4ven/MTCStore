<?php
/**
 * Created by PhpStorm.
 * User: HACKCR0W
 * Date: 30/11/2019
 * Time: 15:08
 */

/**
*
* THIS FILE DISPLAY THE FORM FOR THE LOGIN AND CALL FOR HONEYPOT TO AVOID SECURITY FLAWS ON THE FORM
*
*/


$cssClassBody = "text-center";

include_once 'header.php';

$_SESSION['token'] = true;// Token to make the login possible

if(isset($_SESSION['logado']) && $_SESSION['logado']==true){header('location: dashboard/index.php');}// is the user is already loged in, skip this page and throw him to the admin dashboard

require '../control/security/honeypot_security.php';//honeypot fields
$login_honeypot = new Honeypot();

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


?>

<div>

    <form class="form-signin" method="post" autocomplete="off" action="../control/login/loginvalid.php">
        <img class="mb-4" src="http://localhost/site/assets/images/crow.png" alt="login" width="200" height="200">
        <?php $login_honeypot->display_honeypot()?>
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="mailADM" class="sr-only">Endereço de email</label>
        <input type="email" id="mailADM" name="mailADM" class="form-control" placeholder="Endereço de email" required autofocus>
        <label for="senhadeentrada" class="sr-only">Senha</label>
        <input type="password" id="senhadeentrada" name="senhadeentrada" class="form-control" placeholder="Senha..." required>
        <button class="btn btn-lg btn-primary btn-block" name="btnLogar" id="btnLogar" type="submit">Logar</button>
    </form>
</div>

<?php

include_once 'footer.php';

?>
