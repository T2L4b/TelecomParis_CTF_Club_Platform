<?php
class User
{
    // database connection and table name
    private $PDO;
    private $table_name = "USERS";

    // object properties
    public $api_key;
    public $pseudo;
    public $hash;
    public $phone;
    public $mail;
    public $status = 'Member';

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // create user
    function create() {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " (api_key, pseudo, hash, phone, mail, status) VALUES (:api_key, :pseudo, :hash, :phone, :mail, :status)";

        // prepare query
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->api_key = htmlspecialchars(strip_tags($this->api_key));
        $this->pseudo  = htmlspecialchars(strip_tags($this->pseudo));
        $this->hash    = htmlspecialchars(strip_tags($this->hash));
        $this->hash    = md5($this->hash);
        $this->phone   = htmlspecialchars(strip_tags($this->phone));
        $this->mail    = htmlspecialchars(strip_tags($this->mail));
        // sanitize if status isn't a default setting!
        //$this->status  = $this->status;

        // bind values
        $stmt->bindParam(":api_key", $this->api_key);
        $stmt->bindParam(":pseudo", $this->pseudo);
        $stmt->bindParam(":hash", $this->hash);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":mail", $this->mail);
        $stmt->bindParam(":status", $this->status);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // read user
    function readCurrent() {
        // only the required fields should be displayed to the user
        // limit to 1 even if pseudo is a unique identifier
        $query = "SELECT pseudo, api_key, phone, mail, status FROM " . $this->table_name . " WHERE api_key LIKE :api_key LIMIT 1";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->api_key = htmlspecialchars(strip_tags($this->api_key));

        // bind param
        $stmt->bindParam(":api_key", $this->api_key);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
