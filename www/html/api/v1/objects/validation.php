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
        $query = "INSERT INTO " . $this->table_name . " (idUser, idChall, validationDate)
        VALUES (:idUser, :idChall, NOW())";

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

    function validationExists() {
        // query to check if validation exists
        $query = "SELECT idUser, idChall FROM " . $this->table_name . " WHERE idUser = :idUser AND idChall = :idChall LIMIT 0,1";
        $stmt = $this->PDO->prepare($query);

        // sanitize && bind given pseudo value
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));
        $this->idChall = htmlspecialchars(strip_tags($this->idChall));
        $stmt->bindParam(":idUser", $this->idUser);
        $stmt->bindParam(":idChall", $this->idChall);

        $stmt->execute();
        $num = $stmt->rowCount();

        // if validation exists return true
        if ($num > 0) {
            return true;
        }
        // validation doesn't exist in the database
        return false;
    }

    function readValidations($pseudo) {
        $query = "SELECT pseudo, validationDate, type, title, points, difficulty FROM VALIDATIONS INNER JOIN CHALLENGES ON VALIDATIONS.idChall = CHALLENGES.idChall INNER JOIN USERS ON VALIDATIONS.idUser = USERS.idUser WHERE USERS.pseudo = :pseudo";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // pseudo sanitized at login - bind param
        $stmt->bindParam(":pseudo", $pseudo);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
