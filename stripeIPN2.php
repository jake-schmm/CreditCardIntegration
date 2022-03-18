<?php

  // include necessary file to call Strip functions with \Stripe\Stripe
  require_once "stripe-php-master/init.php";

// prevent errno 77 Network error when communicating with Stripe since not over HTTPS
\Stripe\Stripe::setVerifySslCerts(verify: false); 


// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
\Stripe\Stripe::setApiKey("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");

// Token is created using Stripe Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
  'amount' => 50,
  'currency' => 'usd',
  'description' => 'Example charge',
  'source' => $token,
]);

echo "Successful payment.";
?>