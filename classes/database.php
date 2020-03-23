<?php

class Database{

private static $conn;

public static function getConnection(){

//include_once(__DIR__ . "/../settings/settings.php");

    if(self::$conn === null){
        self::$conn = new PDO("mysql:host=localhost; dbname=php-project", "root", "" );
        
        return self::$conn;
    }
    else{
        
        return self::$conn;
    }

}
}