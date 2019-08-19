<?php
class Author
{
    // database connection and table name
    private $PDO;
    private $table_name = "AUTHORS";

    // object properties
    public $pseudo;
    public $idChall;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // read authors
    function readAuthors() {
        $query = "SELECT pseudo FROM " . $this->table_name . " WHERE idChall LIKE :idChall";

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
        $query = "SELECT idChall FROM " . $this->table_name . " WHERE pseudo LIKE :pseudo";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->pseudo = htmlspecialchars(strip_tags($this->pseudo));

        // bind param
        $stmt->bindParam(":pseudo", $this->pseudo);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
