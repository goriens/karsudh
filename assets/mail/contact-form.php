<?php
$conName = $_POST['conName'];
$conEmail = $_POST['conEmail'];
$conMessage = $_POST['conMessage'];

ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Set the recipient email address.
 * 
 * FIXME: Update this to your desired email address.
 */
$recipient = "support@themejunction.net";

// Set the email subject.
$sender = $conName . " { " . $conEmail . " }";


//Email Header
$head = "You have a new message from your Webency website Contact Form\n=============================";

// Build the email content.
$form_content = "$head\n\n";

$form_content .= "Full Name: $conName\n";

$form_content .= "Email: $conEmail\n";

$form_content .= "Message: \n$conMessage\n";


// Build the email headers.
$headers = "From: $conName < $conEmail >\r\n" .
  "Reply-To:" . $conEmail . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

if (mail($recipient, $sender, $form_content, $headers)) {
  echo "Y";
} else {
  echo "N";
}
