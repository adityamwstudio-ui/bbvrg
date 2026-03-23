<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize inputs
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
    $subject = htmlspecialchars(strip_tags(trim($_POST["subject"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit;
    }

    // Your receiving email
    $to = "viraj@thewebdecor.com"; // change to your email

    // Email subject
    $mail_subject = "Website Contact Form: " . $subject;

    // Email body
    $body = "
You have received a new message from your website.

Name: $name
Email: $email
Phone: $phone
Subject: $subject

Message:
$message
";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $mail_subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }

} else {
    echo "Invalid request";
}

?>