<?php

class SPDO {
    const HOST = 'mysql';
    const DB   = 'TP_CTF';
    public $conn = null;

    // @TODO create db user and insert with 
    // user account instead of root 
    const USER = 'root';
    const PWD  = 'rootpassword';

    public function getConnection() {
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB, self::USER, self::PWD);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>
