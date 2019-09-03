<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/SPDO.php';
include_once '../objects/challenge.php';
include_once '../objects/validation.php';

// prepare connexion and instantiate challenge object
$conn = new SPDO();
$challenge = new challenge($conn->getConnection());
$validation = new validation($conn->getConnection());

// get data from post request
$rest_json = file_get_contents("php://input");
$idChall = $_POST['chall'];
$flag = $_POST['flag'];

// FIXME : Remove user once auth ok with jwt
$pseudo = $_POST['user'];

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
    echo json_encode(array("message" => "Flag is valid"));

  } else {
    // set response code - 200 OK
    http_response_code(200);

    // tell the flag is wrong
    echo json_encode(array("message" => "Flag is not valid"));
  }
} else { // tell the challenge data is incomplete
  // set response code - 400 bad request
  http_response_code(400);

  // tell the challenge
  echo json_encode(array("message" => "Unable to process flag, data is incomplete."));
}

?>
