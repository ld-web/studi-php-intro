<?php

require_once 'Email.php';

try {
  $email = new Email("test@test.com");
  var_dump($email);
} catch (InvalidArgumentException $e) {
  echo $e->getMessage();
}
