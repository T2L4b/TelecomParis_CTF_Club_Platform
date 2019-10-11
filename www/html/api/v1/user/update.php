<?php
// verify authentication
include_once("../auth/validate_token.php");
use \Firebase\JWT\JWT;
include_once("../../../../config/filters.php");

// get user properties to be edited
$data = json_decode(file_get_contents("php://input"));
$fields = array();
$old_pseudo = $user->pseudo;
$old_hash = $user->hash;

// init logger
$logger = new Katzgrau\KLogger\Logger(LOG_PATH);

// set new properties
/* DANGEROUS IMPLEMENTATION OF METHOD UPDATE IN USER
   only add the given field - no more otherwise a user
   that find the api endpont (easy) can change his information
   easily. Doesn't matter for any current information except
   the score that always should be change by validation!
*/
if (isset($data->pseudo) && (!empty($data->pseudo))) {
    $user->pseudo = $data->pseudo;
    $fields[] = 'pseudo';

    if ($user->pseudoExists() ) {
        http_response_code(503);
        echo API_ERROR;
        // emergency as the (malicious) user tried to bypass the front verification!
        $logger->emergency("Unable to update user, pseudo already exists: " . $old_pseudo . " to " . $user->pseudo . " from IP " . $_SERVER['REMOTE_ADDR']);
        exit();
     }
}
if (isset($data->hash) && (!empty($data->hash))) {
    $user->hash = password_hash($data->hash, PASSWORD_DEFAULT);
    $fields[] = 'hash';
}
if (isset($data->mail) && (!empty($data->mail)) && Filters::validateEmail($data->mail)) {
    $user->mail = $data->mail;
    $fields[] = 'mail';

    if ($user->emailExists() ) {
        http_response_code(503);
        echo API_ERROR;
        // emergency as the (malicious) user tried to bypass the front verification!
        $logger->emergency("Unable to update user, mail already exists: " . $old_pseudo . " to " . $user->mail . " from IP " . $_SERVER['REMOTE_ADDR']);
        exit();
     }
}
if (isset($data->phone) && (!empty($data->phone)) && Filters::validatePhoneNumber($data->phone)) {
    $user->phone = $data->phone;
    $fields[] = 'phone';
}

// update the user
if (empty($fields)) {
    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array(API_MESSAGE => "Nothing to update."));

    $logger->info("update user, nothing to update 200");
}
// if fields empty - do nothing - to do: treat in front-end
else if ($user->update($old_pseudo, $old_hash, $fields)) {
    // re-generate jwt as user details might have changed
    $token = array(
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => array(
            "pseudo" => $user->pseudo,
            "hash" => $user->hash
        )
    );
    $jwt = JWT::encode($token, $key);

    // set response code
    http_response_code(200);

    // response in json format
    echo json_encode(
        array(
            API_MESSAGE => "User was updated.",
            "jwt" => $jwt
        )
    );
    $logger->info("updated user 200");
}
// if unable to update the user, tell the user
else {
    // set response code - 503 service unavailable
    http_response_code(503);
    echo API_ERROR;
    
    $logger->error("Unable to update user 503 " . $old_pseudo);
}
