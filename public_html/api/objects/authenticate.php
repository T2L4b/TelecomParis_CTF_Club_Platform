<?php
class Authentification
{
    // database connection and table name
    private $PDO;
    private $table_name = "USERS";

    public $api_key;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // ckeck if key is valid
    function isValidKey() {
        $query = "SELECT key_validity FROM " . $this->table_name . " WHERE api_key LIKE :api_key LIMIT 1";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->api_key = htmlspecialchars(strip_tags($this->api_key));

        // bind param
        $stmt->bindParam(":api_key", $this->api_key);

        // execute query
        $stmt->execute();

        $num  = $stmt->rowCount();


        if ($num < 1)
            return false;
        
        // fetch result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // FIXME : for demo purposes, one hour is added 
        $date = strtotime($row["key_validity"]) + mktime(1,0,0,0,0,0);

        // check key validity
        return $date - time() > 0;
    }

    // extend key validity
    // FIXME: doesn't work
    function extendKey() {
        $query = "UPDATE ". $this->table_name . " SET key_validity = key_validity + " . mktime(1,0,0,0,0,0) . "WHERE api_key LIKE :api_key" ;

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->api_key = htmlspecialchars(strip_tags($this->api_key));

        // bind param
        $stmt->bindParam(":api_key", $this->api_key);

        // execute query
        $stmt->execute();
    }

}
