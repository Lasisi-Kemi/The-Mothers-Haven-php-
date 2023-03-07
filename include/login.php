<?php

// Begin a session for the user...
session_start();

//// ******************* ////


// These lines of code below ensures that unauthenticated users cannot access any pages except for the login page, which they can access in order to log in and gain access to other pages.


// allow unauthenticated users to access the login page
//if (basename($_SERVER['PHP_SELF']) != 'login.php') {
    //header("Location: login.php");
    //exit();
//}

// Unauthenticated users code ends here...




//// ******************* ////





// User login page
if(isset($_POST['login'])) {
    // Sanitize input data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // Validate input data
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif(empty($password)) {
        $error = "Please enter your password.";
    } else {

        // Import database from config file
        include ('config.php');

        // Prepare and execute SQL query to check if email exists in database
        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 1) {
            $stmt->bind_result($id, $name, $email, $hashed_password);
            $stmt->fetch();

            if(password_verify($password, $hashed_password)) {
                // Set session variables and redirect to dashboard
                $_SESSION['user_id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header("Location: ../community/community.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }

        $stmt->close();
        //mysqli_close($conn);
    }
}
?>