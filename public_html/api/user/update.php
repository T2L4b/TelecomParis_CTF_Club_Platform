<?php
// API Array key returned message
define("API_INFO", "message");

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// verify authentication
require_once "../auth/validate_token.php";

// include database and object files
include_once '../config/SPDO.php';
include_once '../objects/user.php';

// prepare connexion and instantiate user object
$conn = new SPDO();
$user = new User($conn->getConnection());

// get user properties to be edited
$data = json_decode(file_get_contents("php://input"));
$fields = array();

// set new properties
// @TODO replace isset and empty by filters
// ugly code just for testing :)
if (isset($data->pseudo) && (!empty($data->pseudo))) {
    $user->pseudo = $data->pseudo;
    $fields[] = 'pseudo';
}
if (isset($data->api_key) && (!empty($data->api_key))) {
    $user->api_key = $data->api_key;
    $fields[] = 'api_key';
}
if (isset($data->hash) && (!empty($data->hash))) {
    $user->hash = $data->hash;
    $fields[] = 'hash';
}
if (isset($data->mail) && (!empty($data->mail))) {
    $user->mail = $data->mail;
    $fields[] = 'mail';
}
if (isset($data->phone) && (!empty($data->phone))) {
    $user->phone = $data->phone;
    $fields[] = 'phone';
}
if (isset($data->status) && (!empty($data->status))) {
    $user->status = $data->status;
    $fields[] = 'status';
}
if (isset($data->score) && (!empty($data->score))) {
    $user->score = $data->score;
    $fields[] = 'score';
}

// update the user
if (empty($fields)) {
    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array(API_INFO => "Nothing to update."));
}
// if fields empty - do nothing - to do: treat in front-end
else if ($user->update($old_api_key, $fields)) {
    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array(API_INFO => "User was updated."));
}
// if unable to update the user, tell the user
else {
    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array(API_INFO => "Unable to update user."));
}
