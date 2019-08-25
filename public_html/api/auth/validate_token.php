<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/SPDO.php';
include_once '../objects/user.php';
// required import to decode jwt
include_once './../config/core.php';
include_once './../libs/php-jwt/src/BeforeValidException.php';
include_once './../libs/php-jwt/src/ExpiredException.php';
include_once './../libs/php-jwt/src/SignatureInvalidException.php';
include_once './../libs/php-jwt/src/JWT.php';

use \Firebase\JWT\JWT;

// get posted data and jwt
$data = json_decode(file_get_contents("php://input"));
$jwt  = isset($data->jwt) ? $data->jwt : "";

// if jwt is not empty
if ($jwt) {
  // if decode succeed, show user details
  try {
    // decode jwt
    $decoded = JWT::decode($jwt, $key, array('HS256'));

    /*
    http_response_code(200);
    echo json_encode(array(
      "message" => "Access granted.",
      "data" => $decoded->data
    ));*/

    // prepare connexion and instantiate user object
    $conn = new SPDO();
    $user = new User($conn->getConnection());
    $user->pseudo = $decoded->data->pseudo;
    $user->hash   = $decoded->data->hash;

    // if decode fails, it means jwt is invalid
  } catch (Exception $e) {

    // set response code
    http_response_code(401);

    // tell the user access denied  & show error message
    echo json_encode(array(
      "message" => "Access denied.",
      "error" => $e->getMessage()
    ));

    exit();
  }

  // show error message if jwt is empty
} else {

  // set response code
  http_response_code(401);

  // tell the user access denied
  echo json_encode(array("message" => "Access denied."));

  exit();
}
