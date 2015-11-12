<?php

include dirname(__FILE__).'/stripe/config.php';

  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => 'joshualivesay@gmail.com',
      'card'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 89900,
      'currency' => 'usd'
  ));

  echo '<h1>Successfully charged $899.00!</h1>';
?>