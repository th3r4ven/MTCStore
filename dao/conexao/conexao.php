<?php
/**
 * Created by PhpStorm.
 * User: TH3R4VEN
 * Date: 01/12/2019
 * Time: 02:04
 */


abstract class conexao
{
    public static function conect(){
        try{
            $db = mysqli_connect("localhost","root","","M4tH_D05_Pr0gR4m4");
        }catch (mysqli_sql_exception $ex){
            echo $ex->getMessage();
        }
        return $db;
    }

    public static function FechaConexao($db)
    {
        $db->close();
    }

}