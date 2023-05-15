<?php

class configDB
{
    public static function GetConnection()
    {
        try {
        $dsn="mysql:dbname=CityHospital";
        $user="root";
        $pw="";
        $conn= new PDO($dsn,$user,$pw);
        return $conn;
        } catch (Exception $e) {

            throw $e;
        }
   
    }
}
 
?>