<?php
include_once __DIR__.'/../Config.php';

class Connection {
    /*Variaveis de conexão*/
    
    private static $OPTIONS = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    
    private static $conn;

    public static function getConnection() {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", 
                        USERNAME, PASSWORD, self::$OPTIONS);
            } catch(PDOException $e) { 
                echo 'ERRO : '. $e->getMessage();
            }
        }
        
        return self::$conn;
    }
}
