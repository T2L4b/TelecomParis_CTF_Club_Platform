<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/SPDO.php';
include_once '../objects/user.php';
// prepare connexion and instantiate user object
$conn = new SPDO();
$user = new User($conn->getConnection());

// get body posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(! (empty($data->api_key) && empty($data->pseudo) && empty($data->hash) && empty($data->phone) && empty($data->mail))) {
    // set user property values
    $user->api_key   = $data->api_key;
    $user->pseudo    = $data->pseudo;
    $user->hash      = $data->hash;
    $user->phone     = $data->phone;
    $user->mail      = $data->mail;
    
    // create the user
    if($user->create()){
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "User was created."));

    // if unable to create the user, tell the user
    } else{
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create user."));
    }
} else{ // tell the user data is incomplete
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create user, data is incomplete."));
}

?>
