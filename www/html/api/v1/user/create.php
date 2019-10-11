<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
require_once '../../../../vendor/autoload.php';
include_once '../../../../config/SPDO.php';
include_once("../../../../config/filters.php");
include_once '../objects/user.php';

// init logger
$logger = new Katzgrau\KLogger\Logger(LOG_PATH);

// prepare connexion and instantiate user object
$conn = new SPDO();
$user = new User($conn->getConnection());

// get body posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if( (!empty($data->pseudo)) && isset($data->pseudo) && (!empty($data->hash)) && isset($data->hash) && isset($data->phone) && Filters::validatePhoneNumber($data->phone) && isset($data->mail) && Filters::validateEmail($data->mail)) {

    // set user property values
    $user->pseudo = $data->pseudo;
    $user->hash   = $data->hash;
    $user->mail   = $data->mail;
    $user->phone  = $data->phone;

    if ($user->pseudoExists()) {
        http_response_code(503);
        echo API_ERROR;
        // emergency as the (malicious) user tried to bypass the front verification!
        $logger->emergency("Unable to create user, pseudo already exists: " . $user->pseudo . " from IP " . $_SERVER['REMOTE_ADDR']);
        exit();

    } else if ($user->emailExists()) {
        http_response_code(503);
        echo API_ERROR;
        // emergency as the (malicious) user tried to bypass the front verification!
        $logger->emergency("Unable to create user, mail already exists: " . $user->mail . " from IP " . $_SERVER['REMOTE_ADDR']);
        exit();
        
     } else {
        // create the user
        if($user->create()){
            // set response code - 201 created
            http_response_code(201);
    
            // tell the user
            echo json_encode(array(API_MESSAGE => "User was created."));
            
            $logger->info("User " . $user->pseudo . " was created from IP " . $_SERVER['REMOTE_ADDR']);

        // if unable to create the user, tell the user
        } else {
            http_response_code(503);
            echo API_ERROR;

            $logger->error("Unable to create user 503");
        }
    }
} else {
    http_response_code(503);
    echo API_ERROR;

    $logger->error("Create user, incomplete or invalid data 400 from IP " . $_SERVER['REMOTE_ADDR']);
}
