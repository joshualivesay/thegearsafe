<?php

include dirname(__FILE__).'/stripe/config.php';

  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => $_POST['stripeEmail'],
      'card'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $_POST['price'],
      'currency' => 'usd'
  ));

    include dirname(__FILE__).'/settings/settings.php';
	include dirname(__FILE__).'/functions/emailValidation.php';
  	include dirname(__FILE__).'/phpmailer/PHPMailerAutoload.php';
  	include dirname(__FILE__).'/templates/orderalert.php';

    $mail = new PHPMailer();
    $mail->isSendmail();
    $mail->IsHTML(true);
    $mail->From = 'noreply@thegearsafe.com';
    $mail->CharSet = "UTF-8";
    $mail->FromName = $_POST['stripeBillingName'];
    $mail->Encoding = "base64";
    $mail->Timeout = 200;
    $mail->ContentType = "text/html";
    $mail->addAddress($receiver_email, $receiver_name);
    $mail->Subject = 'New GearSafe ORDER!';
    $mail->Body = $message;
    $mail->AltBody = "Use an HTML compatible email client";

    // For multiple email recepients from the form
    // Simply change recepients from false to true
    // Then enter the recipients email addresses
    // echo $message;
    $recipients = false;
    if($recipients == true){
        $recipients = array(
            "joshualivesay@gmail.com" => "Joshua Livesay"
        );

        foreach($recipients as $email => $name){
            $mail->AddBCC($email, $name);
        }
    }


    if($mail->Send()) {

    /*	---------------------------------------------------------------------
        : Send the auto responder message if its true
        --------------------------------------------------------------------- */
        if($autoResponder == true){

            include dirname(__FILE__).'/templates/orderconfirm.php';

            $automail = new PHPMailer();
            $automail->isSendmail();
            $automail->From = 'sales@thegearsafe.com';
            $automail->FromName = 'The Gear Safe';
            $automail->isHTML(true);
            $automail->CharSet = "UTF-8";
            $automail->Encoding = "base64";
            $automail->Timeout = 200;
            $automail->ContentType = "text/html";
            $automail->AddAddress($_POST['stripeEmail'], $_POST['stripeBillingName']);
            $automail->Subject = "Order Confirmation";
            $automail->Body = $automessage;
            $automail->AltBody = "Use an HTML compatible email client";
            $automail->Send();
        }

     } else {
        //do nothing
     }
     header("Location: http://thegearsafe.com/");
     die();
?>