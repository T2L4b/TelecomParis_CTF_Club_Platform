<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/SPDO.php';
include_once '../objects/challenge.php';
// prepare connexion and instantiate challenge object
$conn = new SPDO();
$challenge = new challenge($conn->getConnection());

// get data from url
$chall = $_GET['idChall'];
// make sure data is not empty
if (!(empty($chall))) {
  // set challenge property values
  $challenge->idChall = $chall;
  // read current challenge
  $stmt = $challenge->read();
  $num  = $stmt->rowCount();

  // check if more than 0 record found
  if ($num > 0) {
    // challenge array
    $challenge_arr = array();

    // retrieve our table contents: fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $challenge_item = array(
        "idChall"     => $idChall,
        "title"       => $title,
        "type"        => $type,
        "statement"   => $statement,
        "points"      => $points,
        "difficulty"  => $difficulty,
        "author"      => $author
      );

      array_push($challenge_arr, $challenge_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($challenge_arr);

  } else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the challenge no products found
    echo json_encode(array("message" => "No challenge found."));
  }
} else { // tell the challenge data is incomplete
  // set response code - 400 bad request
  http_response_code(400);

  // tell the challenge
  echo json_encode(array("message" => "Unable to read challenge, data is incomplete."));
}

?>
