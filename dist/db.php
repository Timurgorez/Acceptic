<?php

class DB {
    protected $host = "localhost";
    protected $admin = "Tim";
    protected $pass = "12345";
    protected $db_name = "acceptic";
    public $pdo;

    public function __construct(){
        try{
            $pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->admin, $this->pass);
            return $this->pdo = $pdo;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function Validation ($var){
        $var = htmlspecialchars($var, ENT_QUOTES);
        $var = trim($var);
        return $var;
    }

}