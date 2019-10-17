<?php
class Author
{
    // database connection and table name
    private $PDO;
    private $table_name = "AUTHORS";

    // object properties
    public $idUser;
    public $idChall;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // read authors
    function readAuthors() {
        $query = "SELECT idUser FROM " . $this->table_name . " WHERE idChall LIKE :idChall";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->idChall = htmlspecialchars(strip_tags($this->idChall));

        // bind param
        $stmt->bindParam(":idChall", $this->idChall);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // read challenges
    function readChallenges() {
        $query = "SELECT idChall FROM " . $this->table_name . " WHERE idUser LIKE :idUser";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));

        // bind param
        $stmt->bindParam(":idUser", $this->idUser);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
