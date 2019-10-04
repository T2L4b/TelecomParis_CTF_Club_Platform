<?php
// verify authentication
include_once("../auth/validate_token.php");

include_once '../objects/challenge.php';
include_once '../objects/author.php';

// init logger
$logger = new Katzgrau\KLogger\Logger(LOG_PATH);

// prepare connexion and instantiate challenge object
$conn = new SPDO();
$challenge = new challenge($conn->getConnection());
$author = new author($conn->getConnection());

// make sure data is not empty
if (!empty($chall) || !empty($_GET[ID_CHALL]) ) {
  // get data from url
  $chall =  $_GET[ID_CHALL];
  // set challenge property values
  $challenge->idChall = $chall;
  // read current challenge
  $stmt = $challenge->read();
  $num  = $stmt->rowCount();

  // check if more than 0 record found
  if ($num > 0) {

    // retrieve our table contents: fetch() is faster than fetchAll()
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

    // retrive challenge infos
    $challenge_item = array(
      ID_CHALL      => $idChall,
      "title"       => $title,
      "type"        => $type,
      "statement"   => $statement,
      "points"      => $points,
      "difficulty"  => $difficulty,
      "url"         => $url
    );

    // retrieve author(s)
    $author->idChall = $idChall;
    $author_stmt = $author->readAuthors();
    $challenge_item["authors"] = array();
    while ($author_row = $author_stmt->fetch(PDO::FETCH_ASSOC)) {
      array_push($challenge_item["authors"], $author_row["pseudo"]);
    }

    // set response code - 200 OK
    http_response_code(200);
    // show products data in json format
    echo json_encode($challenge_item);

    $logger->info("Challenge read 200");

  } else {
    // set response code - 404 Not found 
    //http_response_code(404);
    // tell the challenge no products found
    //echo json_encode(array(API_MESSAGE => "No challenge found."));

    http_response_code(503);
    echo API_ERROR;

    $logger->error("Challenge read not found 404");
  }
} else { // tell the challenge data is incomplete
  // set response code - 400 bad request
  //http_response_code(400);
  // tell the challenge
  //echo json_encode(array(API_MESSAGE => "Unable to read challenge, data is incomplete."));

  http_response_code(503);
  echo API_ERROR;

  $logger->error("Challenge read data invalid or incomplete 400");
}

?>
