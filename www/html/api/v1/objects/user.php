<?php
class User
{
    // database connection and table name
    private $PDO;
    private $table_name = "USERS";

    // object properties
    public $idUser;
    public $pseudo;
    public $hash;
    public $mail;
    public $phone;
    public $status = 'Member';
    public $score = 0;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // create user
    function create()
    {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " (pseudo, hash, mail, phone, status, score) VALUES (:pseudo, :hash, :mail, :phone, :status, :score)";

        // prepare query
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->pseudo = htmlspecialchars(strip_tags($this->pseudo));
        $this->hash   = htmlspecialchars(strip_tags($this->hash));
        $this->hash   = password_hash($this->hash, PASSWORD_DEFAULT);
        $this->mail   = htmlspecialchars(strip_tags($this->mail));
        $this->phone  = htmlspecialchars(strip_tags($this->phone));
        // sanitize status, score if not default setting

        // bind values
        $stmt->bindParam(":pseudo", $this->pseudo);
        $stmt->bindParam(":hash", $this->hash);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":mail", $this->mail);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":score", $this->score);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // read user
    function readCurrent()
    {
        // only the required fields should be displayed to the user
        // limit to 1 even if pseudo is a unique identifier
        $query = "SELECT idUser, pseudo, hash, phone, mail, status, score FROM " . $this->table_name . " WHERE pseudo = :pseudo AND hash = :hash LIMIT 1";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // pseudo and hash sanitized at login
        // bind param
        $stmt->bindParam(":pseudo", $this->pseudo);
        $stmt->bindParam(":hash", $this->hash);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // update current
    function update($old_pseudo, $old_hash, $fields)
    {
        // update query
        $query = "UPDATE " . $this->table_name . " SET ";
        // if last element do not add comma (query syntax)
        $lastField = end($fields);
        foreach ($fields as $key) {
            if ($key == $lastField) {
                $query .= $key . " = :" . $key;
            } else {
                $query .= $key . " = :" . $key . ", ";
            }
        }
        $query .= " WHERE pseudo = :old_pseudo AND hash = :old_hash LIMIT 1";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        $stmt->bindParam(':old_pseudo', $old_pseudo);
        $stmt->bindParam(':old_hash', $old_hash);

        // sanitize and bind new values
        foreach ($fields as $key) {
            $this->{$key} = htmlspecialchars(strip_tags($this->{$key}));
            $stmt->bindParam(':' . $key, $this->{$key});
        }

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    // check if given pseudo exist in the database
    function pseudoExists()
    {
        // query to check if pseudo exists
        $query = "SELECT idUser, pseudo, hash FROM " . $this->table_name . " WHERE pseudo = ? LIMIT 0,1";
        
        $stmt = $this->PDO->prepare($query);

        // sanitize && bind given pseudo value
        $this->pseudo = htmlspecialchars(strip_tags($this->pseudo));
        $stmt->bindParam(1, $this->pseudo);

        $stmt->execute();
        $num = $stmt->rowCount();

        // if pseudo exists, assign values to object properties for easy access and use for php sessions
        if ($num > 0) {
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->pseudo = $row['pseudo'];
            $this->hash = $row['hash'];
            $this->idUser = $row['idUser'];

            // pseudo exists in the database
            return true;
        }
        // pseudo doesn't exist in the database
        return false;
    }

    // check if given email exist in the database
    function emailExists()
    {
        // query to check if email exists
        $query = "SELECT pseudo, mail, hash FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $this->PDO->prepare($query);

        // sanitize && bind given email value
        $this->mail = htmlspecialchars(strip_tags($this->mail));
        $stmt->bindParam(1, $this->mail);

        $stmt->execute();
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if ($num > 0) {
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->pseudo = $row['pseudo'];
            $this->mail = $row['mail'];
            $this->hash = $row['hash'];

            // pseudo exists in the database
            return true;
        }
        // pseudo doesn't exist in the database
        return false;
    }
    
}
