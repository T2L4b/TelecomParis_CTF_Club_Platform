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
    public $url;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->PDO = $db;
    }

    // read challenge
    function read() {
        // only the required fields should be displayed to the user
        // limit to 1 even if idChall is a unique identifier
        $query = "SELECT idChall, title, type, statement, points, difficulty, url FROM " . $this->table_name . " WHERE idChall LIKE :idChall LIMIT 1";
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

    // read all challenges
    function readAll() {
        // only the required fields should be displayed to the user
        $query = "SELECT idChall, title, type FROM " . $this->table_name;

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // validate flag
    function validate() {
        $query = "SELECT idChall type FROM " . $this->table_name . " WHERE idChall LIKE :idChall AND flag LIKE :flag";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->idChall = htmlspecialchars(strip_tags($this->idChall));
        $this->flag = htmlspecialchars(strip_tags($this->flag));

        // bind param
        $stmt->bindParam(":idChall", $this->idChall);
        $stmt->bindParam(":flag", $this->flag);

        // execute query
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

}
