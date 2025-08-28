<?php
//Name: Tan Chun Keat
//Student ID : 2314612
require_once('Email.php');
require_once('DisclaimerEmailDecorator.php');
require_once('SecureEmailDecorator.php'); 

// Create base email
$email = new Email("Tan", "Lim", "Hello World");
echo "Email to: " .$email->getTo(). "<br>";
echo "Email from: " .$email->getFrom(). "<br>";
echo "Email content: " . $email->getContent() . "<br>";
echo  "<br>";

// Add disclaimer
$disclaimerDecorator = new DisclaimerEmailDecorator($email);
echo "Email to: " .$email->getTo(). "<br>";
echo "Email from: " .$email->getFrom(). "<br>";
echo "Disclaimer Email content: " . $disclaimerDecorator->getContent() . "<br>";
echo  "<br>";
// Add encryption (string reversal)
$secureDecorator = new SecureEmailDecorator($email);
echo "Email to: " .$email->getTo(). "<br>";
echo "Email from: " .$email->getFrom(). "<br>";
echo "Secure Email content: " . $secureDecorator->getContent() . "<br>";
?>