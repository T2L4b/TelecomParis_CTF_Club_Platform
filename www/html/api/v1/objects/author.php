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

    function readChallengeAuthors() {
        $query = "SELECT idChall, pseudo FROM " . $this->table_name . " INNER JOIN USERS USING (idUser) WHERE idChall = :idChall";

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

}
