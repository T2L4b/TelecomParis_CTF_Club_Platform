<?php
// verify authentication
include_once("../auth/validate_token.php");

include_once '../objects/challenge.php';
include_once '../objects/validation.php';

// init logger
$logger = new Katzgrau\KLogger\Logger(LOG_PATH);

// prepare connexion and instantiate challenge object
$conn = new SPDO();
$challenge = new challenge($conn->getConnection());
$validation = new validation($conn->getConnection());

// get data from post request
$rest_json = file_get_contents("php://input");
$idChall = $_POST['chall'];
$flag = $_POST['flag'];

// retrieve pseudo with jwt
$pseudo = $user->pseudo;

// make sure data is not empty
if (!(empty($idChall) || empty($flag))) {
  // set challenge property values
  $challenge->idChall = $idChall;
  $challenge->flag = $flag;

  // verify validity of flag
  if ($challenge->validate()) {
    
    // add challenge and user to validations table
    $validation->pseudo = $pseudo;
    $validation->idChall = $idChall;
    $validation->addValidation();

    // set response code - 200 OK
    http_response_code(200);

    // tell the flag is OK
    echo json_encode(array(API_MESSAGE => "Flag is valid"));

    $logger->info("Validation flag 200");
  } else {
    // set response code - 200 OK
    http_response_code(200);

    // tell the flag is wrong
    echo json_encode(array(API_MESSAGE => "Flag is not valid"));
    
    $logger->info("Validation wrong flag 200");
  }
} else { // tell the challenge data is incomplete
  // set response code - 400 bad request
  http_response_code(400);

  // tell the challenge
  echo json_encode(array(API_MESSAGE => "Unable to process flag, data is incomplete."));

  $logger->error("Validation invalid data 400");
}

?>
