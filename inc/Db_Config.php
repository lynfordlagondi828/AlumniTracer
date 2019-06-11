<?php
class Db_Config{
    
    private $conn;

    function __construct(){
        
    }

    function connect(){

        $this->conn = new PDO("mysql:host=localhost;dbname=norsu_bsc","root","");
        return $this->conn;
    }
}
?>