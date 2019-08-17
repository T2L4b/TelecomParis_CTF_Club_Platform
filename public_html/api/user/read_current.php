<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/SPDO.php';
include_once '../objects/user.php';
// prepare connexion and instantiate user object
$conn = new SPDO();
$user = new User($conn->getConnection());

// make sure get HTTP Auth APIKEY header not empty
// should already be checked by auth verification
if (isset($_SERVER['HTTP_APIKEY']) && (!empty($_SERVER['HTTP_APIKEY']))) {
  // set user property values
  $user->api_key = $_SERVER['HTTP_APIKEY'];

  // read current user
  $stmt = $user->readCurrent();
  $num  = $stmt->rowCount();


  // check if more than 0 record found
  if ($num > 0) {
    // user array
    $user_arr = array();
    $user_arr["records"] = array();

    // retrieve our table contents: fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      // password hash not provided [ON PURPOSE]
      $user_item = array(
        "api_key" => $api_key,
        "pseudo"  => $pseudo,
        "phone"   => $phone,
        "mail"    => $mail,
        "status"  => $status
      );

      array_push($user_arr["records"], $user_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($user_arr);
  } else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(array("message" => "No user found."));
  }
} else { // tell the user data is incomplete
  // set response code - 400 bad request
  http_response_code(400);

  // tell the user
  echo json_encode(array("message" => "Unable to read user, data is incomplete."));
}
