<?php

class Database {
    protected $conn;
    protected $sql;
    protected $table;

    function __construct($servername, $username, $password, $dbname) {
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    function __destruct(){
        $this->conn = null;
    }
    
    public function table($table){
        $this->table = $table;
        $this->sql = "SELECT * FROM ".$this->table;
    }

    public function select($sql){
        $this->sql = "select $sql from $this->table";
    }

    public function get(){
        try {
            $stmt = $this->conn->prepare($this->sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
