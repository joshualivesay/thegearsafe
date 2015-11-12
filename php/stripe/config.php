<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_csWH8BjhvAowYas4a7wILilG",
  "publishable_key" => "pk_test_sZbMxqyhluPT7JkxavbQ5f76"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>