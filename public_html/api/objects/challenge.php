<?php
class Challenge
{
    // database connection and table name
    private $PDO;
    private $table_name = "CHALLENGES";

    // object properties
    public $idChall;
    public $title;
    public $type;
    public $statement;
    public $points;
    public $difficulty;
    public $flag;
    public $author;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // read challenge
    function readCurrent() {
        // only the required fields should be displayed to the user
        // limit to 1 even if idChall is a unique identifier
        $query = "SELECT idChall, title, type, statement, points, difficulty, author FROM " . $this->table_name . " WHERE idChall LIKE :idChall LIMIT 1";
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
