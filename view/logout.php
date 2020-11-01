<?php
/**
 * Created by PhpStorm.
 * User: HACKCR0W
 * Date: 01/12/2019
 * Time: 15:10
 */

/**
 *
 * Logout the User and destroy the session manualy
 *
*/

session_start();
session_destroy();


$csspath = "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://localhost/site/assets/CSS/login.css\">";
include_once 'header.php';

?>

<div class="container text-center">

    <div class="form-signin">
        <img class="mb-4" src="http://localhost/site/assets/images/crow.png" alt="Login" width="200" height="200">
        <a href="site/"><button class="btn btn-lg btn-outline-primary form-control">Ir ao site principal</button></a>
        <br>
        <a href="login.php"><button class="btn btn-lg btn-outline-secondary form-control">Logar Novamente</button></a>
    </div>
</div>

<?php




include_once "footer.php";