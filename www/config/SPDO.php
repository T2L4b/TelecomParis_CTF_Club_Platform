<?php
include_once 'core.php';
include_once '/var/www/vendor/autoload.php'; // absolute path required here

class SPDO {
    const HOST = 'mysql';
    const DB   = 'TP_CTF';
    public $conn = null;

    // @TODO create db user and insert with 
    // user account instead of root 
    const USER = 'root';
    const PWD  = 'rootpassword';
    // protect against SQLi = modern mysql (5.6 here) + PDO's DSN charset
    // source http://shiflett.org/blog/2006/addslashes-versus-mysql-real-escape-string
    const OPTIONS = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ); 

    public function getConnection() {
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB, self::USER, self::PWD, self::OPTIONS);
        }catch(PDOException $exception){
            $logger = new Katzgrau\KLogger\Logger(LOG_PATH);
            $logger->error("PDO Error: " .  $exception->getMessage());
            
            http_response_code(503);
            echo API_ERROR;
            exit();
        }

        return $this->conn;
    }
}

?>
