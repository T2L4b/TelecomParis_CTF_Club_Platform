<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/SPDO.php';
include_once '../objects/authenticate.php';


// prepare connexion and instantiate challenge object
$conn = new SPDO();
$authentification = new authentification($conn->getConnection());

if (isset($_SERVER['HTTP_APIKEY']) && (!empty($_SERVER['HTTP_APIKEY']))) {
    // set user property values
    $authentification->api_key = $_SERVER['HTTP_APIKEY'];
    
    if (!$authentification->isValidKey()) {
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

?>
