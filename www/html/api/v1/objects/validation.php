<?php
class Validation
{
    // database connection and table name
    private $PDO;
    private $table_name = "VALIDATIONS";

    // object properties
    public $idUser;
    public $idChall;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // add a validation
    function addValidation() {
        $query = "INSERT INTO " . $this->table_name . " (idUser, idChall)
        VALUES (:idUser, :idChall)";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->idChall = htmlspecialchars(strip_tags($this->idChall));
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));

        // bind param
        $stmt->bindParam(":idChall", $this->idChall);
        $stmt->bindParam(":idUser", $this->idUser);

        // execute query
        $stmt->execute();

    }
}
