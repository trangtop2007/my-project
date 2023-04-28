<?php
class DB{
    public static $host="localhost";
    public static $username="root";
    public static $password="";
    public static $db="test";

    public $conn;
    public function __construct()
    {
        $this->connect();
    }
    public function connect(){
        $this->conn=new mysqli(self::$host,self::$username,self::$password,self::$db);
        

    }
    
}
?>