<?php


//
class Database {
    private $servername;
    private $dbname;
    private $user;
    private $pass;
    private $pdo;



    public function __construct() {
        
        $this->servername = "localhost";
        $this->dbname = "food";
        $this->user = "root";
        $this->pass = "root";
        try {
            $this->pdo = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
       public function prepare($query) {
        return $this->pdo->prepare($query);
    }
}

    
?>