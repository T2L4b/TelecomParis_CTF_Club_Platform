<?php
// verify authentication
include_once("../auth/validate_token.php");

include_once '../objects/challenge.php';

// init logger
$logger = new Katzgrau\KLogger\Logger(LOG_PATH);

$CHALL_DEV       = "dev";
$CHALL_WEB       = "web";
$CHALL_REVERSE   = "reverse";
$CHALL_FORENSICS = "forensics";
$CHALL_CRYPTO    = "crypto";
$CHALL_RES       = "reseau";

// prepare connexion and instantiate challenge object
$conn = new SPDO();
$challenge = new challenge($conn->getConnection());

// read all challenges
$stmt = $challenge->readAll();
$num  = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // challenge array
    $challenge_arr = array();
    $challenge_arr[$CHALL_DEV] = array();
    $challenge_arr[$CHALL_WEB] = array();
    $challenge_arr[$CHALL_REVERSE] = array();
    $challenge_arr[$CHALL_FORENSICS] = array();
    $challenge_arr[$CHALL_CRYPTO] = array();
    $challenge_arr[$CHALL_RES] = array();

    // retrieve our table contents: fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $challenge_item = array(
        "idChall"    => $idChall,
        "title"      => utf8_decode($title),
        "statement"  => utf8_decode($statement),
        "points"     => $points,
        "difficulty" => utf8_decode($difficulty),
        "url"        => $url
        );

        // put the challenge in the appropriate array
        switch ($type) {
            case $CHALL_DEV:
                array_push($challenge_arr[$CHALL_DEV], $challenge_item);
                break;
            case $CHALL_WEB:
                array_push($challenge_arr[$CHALL_WEB], $challenge_item);
                break;
            case $CHALL_REVERSE:
                array_push($challenge_arr[$CHALL_REVERSE], $challenge_item);
                break;
            case $CHALL_FORENSICS:
                array_push($challenge_arr[$CHALL_FORENSICS], $challenge_item);
                break;
            case $CHALL_CRYPTO:
                array_push($challenge_arr[$CHALL_CRYPTO], $challenge_item);
                break;
            case $CHALL_RES:
                array_push($challenge_arr[$CHALL_RES], $challenge_item);
                break;
            default:
                break;
        }  
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($challenge_arr);

    $logger->info("Challenge read_all 200");

} else {
  http_response_code(503);
  echo API_ERROR;

  $logger->error("Challenge read_all not found 404");
}

?>
