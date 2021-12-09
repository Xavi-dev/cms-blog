<?php 

class Basemysql{
    private $host = '';
    private $db_name = '';
    private $username = '';
    private $password = '';
    private $conn;


    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host='. $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error! No connect to database!" . $e->getMessage();
        }
        return $this->conn;
    }
}
