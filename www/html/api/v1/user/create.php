<?php
// API Array key returned message
define("API_INFO", "message");

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../../../config/SPDO.php';
include_once '../objects/user.php';

// prepare connexion and instantiate user object
$conn = new SPDO();
$user = new User($conn->getConnection());

// get body posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(! (empty($data->pseudo) && empty($data->hash) && empty($data->phone) && empty($data->mail))) {
    // set user property values
    $user->pseudo = $data->pseudo;
    $user->hash   = $data->hash;
    $user->mail   = $data->mail;
    $user->phone  = $data->phone;
    
    // create the user
    if($user->create()){
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array(API_INFO => "User was created."));

    // if unable to create the user, tell the user
    } else{
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array(API_INFO => "Unable to create user."));
    }
} else{ // tell the user data is incomplete
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array(API_INFO => "Unable to create user, data is incomplete."));
}

?>
