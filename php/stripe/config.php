<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => (LIVE) ? STRIPE_LIVE_SK : STRIPE_TEST_SK,
  "publishable_key" => (LIVE) ? STRIPE_LIVE_PK : STRIPE_TEST_PK
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>