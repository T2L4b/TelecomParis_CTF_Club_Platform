<?php
// auth header key
define("AUTHKEY", "HTTP_APIKEY");

// include database and object files
include_once '../config/SPDO.php';
include_once '../objects/user.php';

if (isset($_SERVER[AUTHKEY]) && (!empty($_SERVER[AUTHKEY]))) {
    // prepare connexion and instantiate user object
    $conn = new SPDO();
    $user = new User($conn->getConnection());
    $user->api_key = $_SERVER[AUTHKEY];
    
    if (!$user->gotValidKey()) {
        // set response code - 401 unauthorized
        http_response_code(401);
        // tell the user
        echo json_encode(array("message" => "Invalid credentials, please log again."));
        exit();
    }
} else { // tell the user data is incomplete
    // set response code - 400 bad request
    http_response_code(400);
    // tell the user
    echo json_encode(array("message" => "Unable to authenticate user, data is incomplete."));
    exit();
}
