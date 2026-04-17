<?php
require 'config.php';

$email = "recipient@example.com"; // Change this to your email
$subject = "Test Email";
$body = "This is a test email sent from your PHP project.";

if (sendEmail($email, $subject, $body)) {
    echo "Email sent successfully!";
} else {
    echo "Email failed to send.";
}
?>
