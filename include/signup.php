<?php

session_start();

// Pass all error messages to this error variable
$error = '';

// Import the database configuration code from the config.php file
include ('config.php');

if (isset($_POST['submit'])) {
    // Sanitize and validate user input
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || empty($password)) {
        $error = 'Please fill all required fields.';
    } else {
        // Hash the password for encryption
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // Store user input in session for use in second page
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        // Redirect to interests page
        header("Location: continue.php");
        exit;
    }
}
?>
