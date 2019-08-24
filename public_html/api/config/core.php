<?php
// show error reporting
// TODO do not display error reporting for prod
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Europe/Paris');
 
// variables used for jwt
// FIXME unique and secret key
$key = "sample_key";
// issuer - identifies the principal that issued the JWT.
$iss = "http://tpctf.org";
// audience - identifies the recipients that the JWT is intended for
$aud = "http://tpctf.com";
// issued at - identifies the time at which the JWT was issued
$iat = time();
// not before - identifies the time before which the JWT MUST NOT be accepted for processing
$nbf = time() + (60 * 60); // an hour

?>