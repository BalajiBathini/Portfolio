<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    // Retrieve form data
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Validate and sanitize data further if needed

    // Prepare data for storage
    $data = "Name: $name\nContact: $contact\nEmail: $email\nSubject: $subject\nMessage: $message\n\n";

    // Save data to a text file
    $file = 'form-data.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect to a thank-you page or display a success message
    header("Location: thank-you.html");
    exit();
} else {
    // Handle invalid requests (e.g., direct access to this script)
    header("HTTP/1.0 403 Forbidden");
    echo "Access Forbidden";
    exit();
}
?>
