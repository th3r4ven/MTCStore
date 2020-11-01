<?php
/**
 * Created by PhpStorm.
 * User: HACKCR0W
 * Date: 08/12/2019
 * Time: 14:54
 */

class logoutSystem{


    public function logoutUSer(){
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
            // last request was more than 1 hour ago
            session_unset();     // unset $_SESSION variable for the run-time
            session_destroy();   // destroy session data in storage
        }


        if (!isset($_SESSION['CREATED'])) {
            $_SESSION['CREATED'] = time();
        } else if (time() - $_SESSION['CREATED'] > 3600) {
            // session started more than 1 hour ago
            session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
            $_SESSION['CREATED'] = time();  // update creation time
        }

        if(!isset($_SESSION['logado']) && $_SESSION['logado']!=true){header('location: http://localhost/site/view/login.php');}

        if(isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'Cliente'){header('location: http://localhost/site/view/site/index.php');}
    }

}


