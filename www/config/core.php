<?php
// show error reporting
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Europe/Paris');
 
// JWT var
// FIXME unique and secret key
$key = "sample_key";
// issuer - identifies the principal that issued the JWT.
$iss = "http://tpctf.org";
// audience - identifies the recipients that the JWT is intended for
$aud = "http://tpctf.com";
// issued at - identifies the time at which the JWT was issued
$iat = time();
// not before - identifies the time before which the JWT MUST NOT be accepted for processing
$nbf = time()-1;
// expiration time on or after which the JWT MUST NOT be accepted for processing
$exp = time() + (60 * 60); // an hour after

// API Strings
define("API_MESSAGE", "message"); // API Array key returned message
define("LOG_PATH", __DIR__ . "/logs"); // filepath of the log file
define("API_ERROR", "File not found."); // do not display any error - error are displayed in log not in request
// DB strings
define("ID_CHALL", "idChall");

// generic auth to enter the page
define("GENERIC_KEY", "CTFAPIGENERIC");
define("GENERIC_PW", "Ua22MTvQoWkEewZWM32hDM8eVDfePR");

?>