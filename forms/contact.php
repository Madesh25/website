<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to = "madeshwaran.manikam@gmail.com";  // Replace with your email
    $email_subject = "New message: " . $subject;
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "Failed to send your message. Please try again.";
    }
}
?>