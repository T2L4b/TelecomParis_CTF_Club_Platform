<?php
// verify authentication
include_once("../auth/validate_token.php");

include_once '../../../../config/SPDO.php';
include_once '../objects/challenge.php';

$CHALL_CRYPTO = "crypto";
$CHALL_WEB = "web";

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
    $challenge_arr[$CHALL_WEB] = array();
    $challenge_arr[$CHALL_CRYPTO] = array();

    // retrieve our table contents: fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $challenge_item = array(
        "idChall"     => $idChall,
        "title"       => $title
        );

        // put the challenge in the appropriate array
        switch ($type) {
            case $CHALL_WEB:
                array_push($challenge_arr[$CHALL_WEB], $challenge_item);
                break;
            case $CHALL_CRYPTO:
                array_push($challenge_arr[$CHALL_CRYPTO], $challenge_item);
                break;
            default:
                break;
        }  
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

?>