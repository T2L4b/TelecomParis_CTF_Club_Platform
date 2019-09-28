<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../../../config/SPDO.php';
include_once '../objects/user.php';
// required import to decode jwt
require_once '../../../../config/core.php';
require_once '../../../../vendor/autoload.php';
use \Firebase\JWT\JWT;

/** 
 * Get header Authorization
 * */
function getAuthorizationHeader(){
  $headers = null;
  if (isset($_SERVER['Authorization'])) {
      $headers = trim($_SERVER["Authorization"]);
  }
  else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
      $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
  } elseif (function_exists('apache_request_headers')) {
      $requestHeaders = apache_request_headers();
      // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
      $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
      if (isset($requestHeaders['Authorization'])) {
          $headers = trim($requestHeaders['Authorization']);
      }
  }
  return $headers;
}
/**
* get access token from header
* */
function getBearerToken() {
$headers = getAuthorizationHeader();
// HEADER: Get the access token from the header
if (!empty($headers)) {
  if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
      return $matches[1];
  }
}
return null;
}

// get posted data and jwt
$token = getBearerToken();
$jwt = isset($token) ? $token : "";

// if jwt is not empty
if ($jwt) {
  // if decode succeed, show user details
  try {
    // decode jwt
    $decoded = JWT::decode($jwt, $key, array('HS256'));

    // prepare connexion and instantiate user object
    $conn = new SPDO();
    $user = new User($conn->getConnection());
    $user->pseudo = $decoded->data->pseudo;
    $user->hash   = $decoded->data->hash;

    // if decode fails, it means jwt is invalid
  } catch (Exception $e) {

    // set response code
    http_response_code(401);

    // tell the user access denied & show error message
    echo json_encode(array(
      "message" => "Access denied."
      ,"error" => $e->getMessage()
    ));

    exit();
  }

  // show error message if jwt is empty
} else {

  // set response code
  http_response_code(401);

  // tell the user access denied
  echo json_encode(array("message" => "Access denied."
));

  exit();
}
