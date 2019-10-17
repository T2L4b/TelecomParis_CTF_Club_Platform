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
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if ((!empty($data->idChall)) && isset($data->idChall) && (!empty($data->flag)) && isset($data->flag)) {
  // set challenge property values
  $challenge->idChall = $data->idChall;
  $challenge->flag    = $data->flag;

  // verify validity of flag
  if ($challenge->readCurrent()) {
    // add challenge and user to validations table
    $validation->idUser = $user->idUser; // retrieve user info with jwt
    $validation->idChall = $challenge->idChall;

    // check if the user already flagged this challenge
    if ($validation->validationExists()) {
      // set response code - 200 OK
      http_response_code(200);

      // tell the flag is OK
      echo json_encode(array(API_MESSAGE => "Flag already submitted!"));
      exit();
    }

    $validation->addValidation();

    // retrieve old score
    $stmt = $user->readCurrent();
    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $old_score = $score;
    }
    
    // update user score
    $fields = array();
    $fields[] = 'score';
    $user->score = ($old_score + $challenge->points);
    // update score in database
    $user->update($user->pseudo, $user->hash, $fields);

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
