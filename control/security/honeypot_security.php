<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 30/11/2019
 * Time: 15:48
 */


class Honeypot{

    public function display_honeypot(){
        /**
         * This funciton display a security inputs to forms in general, this feature is called honeypot
         * its commonly used to trick bots to fill this fields and then we can stop then to try to login
         * like brute force attacks can be useless while using this feature.
         **/

        echo "  
                <!-- INICIO H O N E Y -- P O T  -->
                <label class=\"campodehoneypot\" for=\"name\"></label>
                <input class=\"campodehoneypot\" autocomplete=\"false\" type=\"text\" id=\"name\" name=\"name\" placeholder=\"Your name here\" value=\"\">
                <label class=\"campodehoneypot\" for=\"email\"></label>
                <input class=\"campodehoneypot\" autocomplete=\"false\" type=\"email\" id=\"email\" name=\"email\" placeholder=\"Your e-mail here\" value=\"\">
                <!-- FIM H O N E Y -- P O T  -->
                
              ";
        ?>
        <link rel="stylesheet" type="text/css" href="http://localhost/site/assets/CSS/style.css">
        <?php
    }

}