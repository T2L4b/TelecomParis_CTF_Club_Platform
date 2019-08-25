<?php
// verify authentication
include("../auth/validate_token.php");

$data = json_decode(file_get_contents("php://input"));

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
      "pseudo"  => $pseudo,
      "phone"   => $phone,
      "mail"    => $mail,
      "status"  => $status,
      "score"  => $score
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
