<?php

define('LIVE', ($_SERVER['LIVE'] == 'true') ? true : false);
define('DB_USERNAME', $_SERVER['DB_USERNAME']);
define('DB_PASSWORD', $_SERVER['DB_PASSWORD']);
define('SENDGRID_USERNAME', $_SERVER['SENDGRID_USERNAME']);
define('SENDGRID_PASSWORD', $_SERVER['SENDGRID_PASSWORD']);
define('STRIPE_TEST_PK', $_SERVER['STRIPE_TEST_PK']);
define('STRIPE_TEST_SK', $_SERVER['STRIPE_TEST_SK']);
define('STRIPE_LIVE_PK', $_SERVER['STRIPE_LIVE_PK']);
define('STRIPE_LIVE_SK', $_SERVER['STRIPE_LIVE_SK']);

	/* Enter your name or company name below
	 * You can also use your website URL
	--------------------------------------------- */
	$receiver_name = "The Gear Safe";
	
	/* Enter your message subject below
	 * This subject is the one you will see in your email
	------------------------------------------------------ */	
	$receiver_subject = "TheGearSafe Contact Form";
	
	/* Form message will be sent to this email address
	 * For more than one email go to smartprocess.php then
	 * Add addresses to the recipients section
	------------------------------------------------------ */
	$receiver_email = "sales@thegearsafe.com";
	
	/* If you want to redirect to another page after sending the form
	 * Change the $redirectForm option below from (false) to (true)
	 * Then add your redirect page URL replace - http://example.com/thankyou.php
	----------------------------------------------------------------------------- */	
	$redirectForm = false;
	$redirectForm_url = "http://example.com/thankyou.php";
	
	/* Powered BY
	 * You will use both your website NAME and URL
	 * By default its powered by SMARTFORMS - http://www.doptiq.com/smart-forms
	----------------------------------------------------------------------------- */
	$poweredby_name = "TheGearSafe";
	$poweredby_url = "http://www.thegearsafe.com";
	
	/* If you want to store all form data in a CSV file
	 * Change the generateCSV option from (false) to (true)
	------------------------------------------------------------ */
	$generateCSV = true;
	
	/* Name for generated CSV file 
	 * Please don't change this name unless you have to
	------------------------------------------------------------ */	
	$csvFileName = "formcsv.csv";
	
	/* If you want to automatically reply to the sender 
	 * Change the autoresponder option below from (false) to (true)
	-------------------------------------------------------------------- */	
	$autoResponder = true;
?>