<?php

class Database {
    protected $conn;
    protected $sql;
    protected $table;

    function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    function __destruct(){
        $this->conn->close();
    }
    
    public function table($table){
        $this->table = $table;
        $this->sql = "SELECT * FROM ".$this->table;
    }

    public function select($sql){
        $this->sql = "select $sql from $this->table";
    }

    public function get(){
        return $this->conn->query($this->sql);
    }
}
