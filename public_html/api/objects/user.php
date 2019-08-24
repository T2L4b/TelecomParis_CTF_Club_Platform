<?php
class User
{
    const APIKEYBIND = ':api_key';

    // database connection and table name
    private $PDO;
    private $table_name = "USERS";

    // object properties
    public $pseudo;
    public $api_key;
    public $key_validity;
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
        $query = "INSERT INTO " . $this->table_name . " (pseudo, api_key, key_validity, hash, mail, phone, status, score) VALUES (:pseudo, " . self::APIKEYBIND . ", :key_validity, :hash, :mail, :phone, :status, :score)";

        // prepare query
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->pseudo  = htmlspecialchars(strip_tags($this->pseudo));
        $this->api_key = htmlspecialchars(strip_tags($this->api_key));
        // an hour after
        $this->key_validity = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime(date("Y-m-d H:i:s"))));
        $this->hash  = htmlspecialchars(strip_tags($this->hash));
        $this->hash  = password_hash($this->hash, PASSWORD_DEFAULT);
        $this->mail  = htmlspecialchars(strip_tags($this->mail));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        // sanitize status, score, key_validity if not default setting

        // bind values
        $stmt->bindParam(":pseudo", $this->pseudo);
        $stmt->bindParam(self::APIKEYBIND, $this->api_key);
        $stmt->bindParam(":key_validity", $this->key_validity);
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
        $query = "SELECT pseudo, api_key, phone, mail, status, score FROM " . $this->table_name . " WHERE api_key LIKE " . self::APIKEYBIND . " LIMIT 1";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->api_key = htmlspecialchars(strip_tags($this->api_key));

        // bind param
        $stmt->bindParam(self::APIKEYBIND, $this->api_key);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // update current
    function update($old_api_key, $fields)
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

        $query .= " WHERE api_key LIKE :old_api_key LIMIT 1";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $old_api_key = htmlspecialchars(strip_tags($old_api_key));
        $stmt->bindParam(':old_api_key', $old_api_key);

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

    // check if user api_key is valid
    function gotValidKey()
    {

        $query = "SELECT key_validity FROM " . $this->table_name . " WHERE api_key LIKE " . self::APIKEYBIND . " LIMIT 1";

        // prepare query statement
        $stmt = $this->PDO->prepare($query);

        // sanitize
        $this->api_key = htmlspecialchars(strip_tags($this->api_key));

        // bind param
        $stmt->bindParam(self::APIKEYBIND, $this->api_key);

        // execute query
        $stmt->execute();

        $num  = $stmt->rowCount();
        if ($num < 1) {
            return false;
        }

        // fetch result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $date = strtotime($row["key_validity"]);
        // check key validity
        return $date - time() > 0;
    }

    // check if given pseudo exist in the database
    function pseudoExists() {
        // query to check if pseudo exists
        $query = "SELECT pseudo, hash FROM " . $this->table_name . " WHERE pseudo = ? LIMIT 0,1";
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

            // pseudo exists in the database
            return true;
        }

        // pseudo doesn't exist in the database
        return false;
    }
}
