<?php
// verify authentication
include_once("../auth/validate_token.php");
include_once("../objects/validation.php");

// init logger
$logger = new Katzgrau\KLogger\Logger(LOG_PATH);

$validation = new validation($conn->getConnection());
$stmt = $validation->readValidations($user->pseudo);
$num  = $stmt->rowCount();

// check if more than 0 record found (rank request also made on pseudo so no double check)
if ($num > 0) {
  // user array
  $validations_arr = array();
  $validations_arr["records"] = array();

  // retrieve our table contents: fetch() is faster than fetchAll()
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $validation_item = array(
      "pseudo"          => $pseudo,
      "validationDate"  => $validationDate,
      "type"            => $type,
      "title"           => $title,
      "points"          => $points,
      "difficulty"      => $difficulty
    );

    array_push($validations_arr["records"], $validation_item);
  }

  // set response code - 200 OK
  http_response_code(200);
  echo json_encode($validations_arr);

  $logger->info("User validations 200");

} else {
  
  http_response_code(200);
  echo "No validation found 404 for pseudo";

  $logger->error("No validation found 404 for pseudo: " . $user->pseudo);
}
