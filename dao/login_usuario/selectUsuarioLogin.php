<?php
/**
 * Created by PhpStorm.
 * User: HACKCR0W
 * Date: 01/12/2019
 * Time: 02:21
 */


/**
 * Class Login_usuario
 *
 * This class selects the user that did the login on the site, and returns the User Name, Email and ID
 * Otherwise will return 0 if the user did something wrong or dont exists
 */

class Login_usuario{

    public $dbconec;
    public function selectUsuario($email, $senha){


        $query = 'SELECT id, email, username, user_type FROM M4tH_Usu4r105 WHERE email = \'' . $email . '\' AND senha = \'' . $senha . '\';' ;


        $resultado = mysqli_query($this->dbconec, $query);

        if(!$resultado){
            echo "Query error.";
            return '0';
        }else{
            foreach($resultado as $resul){
                return $resul;

            }
        }


    }





}

