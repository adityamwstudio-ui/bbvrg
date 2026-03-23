<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid Email Address";
        exit;
    }

    // Your email
    $to = "viraj@thewebdecor.com"; // change this

    // Email subject
    $mail_subject = "New Quote Request from Website";

    // Email message
    $message = "
New Quote Request Received

Name: $name
Email: $email
Phone: $phone
Message: $subject
";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if(mail($to, $mail_subject, $message, $headers)){
        echo "success";
    } else {
        echo "error";
    }

}
?>