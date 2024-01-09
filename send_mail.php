<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("./sendgrid-php.php"); 
// If not using Composer, uncomment the above line

//Error message
$emailErr = "Invalid Email Format";

//Send to email
$sendtoEmail = "dejanteofilovic2@gmail.com";

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//lets validate the email first
if(filter_var($email, FILTER_VALIDATE_EMAIL))
{

	$fromEmail = $email;
	$fromName = $firstname; 

	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom($fromEmail, $fromName);
	$email->setSubject($subject);
	$email->addTo($sendtoEmail, "dejanteofilovic");
	$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
	$email->addContent(
	    "text/html", "Message : {$message}"
	);
	$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
	try {
	    $response = $sendgrid->send($email);
	    print $response->statusCode() . "\n";
	    print_r($response->headers());
	    print $response->body() . "\n";
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	header('Location: thank_you.html');	
}
else
{
	header('Location: error_page.html');
}
