<?php
require_once('config.php');

class DbConnection{
    public $db;
    public function __construct()
    {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
        try{
            $pdo = new PDO($dsn,DB_USER,DB_PSWD);
            if($pdo){
                $this->db = $pdo;
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>