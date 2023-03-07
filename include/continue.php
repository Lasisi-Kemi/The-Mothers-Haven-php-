<?php
session_start();

// Handles all error messages
$error = '';

if (isset($_POST['submit'])) {
    // Validate and sanitize user input
    $interests = isset($_POST['interests']) ? $_POST['interests'] : '';
    if (is_array($interests)) {
        $interests = array_map('trim', $interests);
        $interests = array_map('strip_tags', $interests);
    } else {
        $interests = trim($interests);
        $interests = strip_tags($interests);
        $interests = explode(',', $interests);
        $interests = array_map('trim', $interests);
    }

    // Check if an interest is selected
    if (count($interests) < 1) {
        $error = 'Please, select at least one (1) interest.';
    } else {
        // Establish database connection
        include ('config.php');


        // Prepare the SQL statement to insert data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, interests) VALUES (?, ?, ?, ?)");

        // Convert the interests array to a comma-separated string
        $interests_str = implode(',', $interests);
        
        // Bind parameters to the prepared statement
        $stmt->bind_param("ssss", $name, $email, $password, $interests_str);

        // Get user data from session
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        // Execute SQL statement
        if ($stmt->execute()) {
            // Redirect user to login page
            header("Location: login.php");
            exit;
        } else {
            $error = 'Error inserting user data into database. Please try again later.';
        }
    }
}
?>
