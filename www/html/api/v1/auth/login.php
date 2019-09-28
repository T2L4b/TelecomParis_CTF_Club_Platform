<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
require_once '../../../../config/core.php';
require_once '../../../../vendor/autoload.php';
include_once '../../../../config/SPDO.php';
include_once '../objects/user.php';

// prepare connexion and instantiate user object
$conn = new SPDO();
$user = new User($conn->getConnection());

// get posted data
$data = json_decode(file_get_contents("php://input"));

// check if user match
$user->pseudo = $data->pseudo;

// generate json web token
use \Firebase\JWT\JWT;

// check if email exists and if password is correct
if($user->pseudoExists() && password_verify($data->password, $user->hash)){

  $token = array(
     "iss" => $iss,
     "aud" => $aud,
     "iat" => $iat,
     "nbf" => $nbf,
     "exp" => $exp,
     "data" => array(
         "pseudo" => $user->pseudo,
         "hash" => $user->hash
     )
  );

  // generate jwt
  $jwt = JWT::encode($token, $key);

  // set response code
  http_response_code(200);
  echo json_encode(
          array(
              "message" => "Successful login.",
              "jwt" => $jwt
          )
      );

} else { // login failed
  // set response code
  http_response_code(401);

  // tell the user login failed
echo json_encode(array("message" => "Login failed."));
}

?>