<?php
include_once '/var/www/vendor/autoload.php'; // absolute path required here

class Filters
{
  public static function validateEmail($email)
  {
    if ((!empty($email)) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
     } else {
      http_response_code(503);
      echo API_ERROR;

      $logger = new Katzgrau\KLogger\Logger(LOG_PATH);
      $logger->info("Create user invalid email " . $email);
    }
  }

  public static function validatePhoneNumber($phone)
  {
    // phone like 0612345678 or +33612345678
    if ((!empty($phone)) && (preg_match('/^[0-9]{10}+$/', $phone) || preg_match('^[+]{1}[0-9]{11}+$', $phone)) ) {
      return true;
     } else {
      http_response_code(503);
      echo API_ERROR;

      $logger = new Katzgrau\KLogger\Logger(LOG_PATH);
      $logger->info("Create user invalid phone number " . $phone);
    }
  }

}

?>