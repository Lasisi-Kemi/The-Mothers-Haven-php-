<?php

if(isset($_POST['logout'])) {
  session_start(); // Start the session
  session_destroy(); // Destroy all session data
  header("Location: ../user/login.php"); // Redirect to login page
  exit; // Exit the script
}

?>
