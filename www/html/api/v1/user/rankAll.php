<?php
// verify authentication
include_once("../auth/validate_token.php");

// init logger
$logger = new Katzgrau\KLogger\Logger(LOG_PATH);

// read current user
$stmt = $user->readAllRanks();

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
      "score"   => $score
    );

    array_push($user_arr["records"], $user_item);
  }

  // set response code - 200 OK
  http_response_code(200);
  echo json_encode($user_arr);

  $logger->info("User rankAll 200");

} else {
  
  http_response_code(503);
  echo API_ERROR;

  $logger->error("User rankAll not found 404 " . $user->pseudo);
}
