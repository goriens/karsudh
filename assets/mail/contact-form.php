<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $conName = $_POST['conName'];
   $conEmail = $_POST['conEmail'];
   $conMessage = $_POST['conMessage'];

   ini_set('display_errors', 1);
   error_reporting(E_ALL);

   $recipient = "contact@karsudh.com";
   $sender = $conName . " { " . $conEmail . " }";
   $head = "You have a new message from your Webency website Contact Form\n=============================";
   $form_content = "$head\n\n";
   $form_content .= "Full Name: $conName\n";
   $form_content .= "Email: $conEmail\n";
   $form_content .= "Message: \n$conMessage\n";
   $headers = "From: $conName < $conEmail >\r\n" .
               "Reply-To:" . $conEmail . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

   if (mail($recipient, $sender, $form_content, $headers)) {
       echo "Y";
   } else {
       echo "N";
   }
} else {
   // If the request method is not POST, return an error message
   http_response_code(405); // Set the HTTP response code to 405 (Method Not Allowed)
   echo "Error: This script can only be accessed via a POST request.";
   exit;
}
?>