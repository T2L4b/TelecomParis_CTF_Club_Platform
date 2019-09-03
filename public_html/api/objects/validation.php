<?php
class Validation
{
    // database connection and table name
    private $PDO;
    private $table_name = "VALIDATIONS";

    // object properties
    public $pseudo;
    public $idChall;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // add a validation
    function addValidation() {
        $query = "INSERT INTO " . $this->table_name . " (pseudo, idChall)
        VALUES (:pseudo, :idChall)";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->idChall = htmlspecialchars(strip_tags($this->idChall));
        $this->pseudo = htmlspecialchars(strip_tags($this->pseudo));

        // bind param
        $stmt->bindParam(":idChall", $this->idChall);
        $stmt->bindParam(":pseudo", $this->pseudo);

        // execute query
        $stmt->execute();

    }
}
