<?php

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

// Get the user ID from the session data
$user_id = $_SESSION["user_id"];

// Check if the user has submitted the form
    // Connect to the database
    require_once('config.php');

    // Get the uploaded image file
    $image = $_FILES["image"]["tmp_name"];

    // Check if an image was uploaded
    if ($image != "") {
        // Get the image file extension and check if it is valid
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($extension, $valid_extensions)) {
            // Read the image file and convert it to binary data
            $binary_image = file_get_contents($image);

            // Insert the binary data into the database
            $sql = "UPDATE users SET profile_pic = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $binary_image, $user_id);
            mysqli_stmt_execute($stmt);

            // Check if the update was successful
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Profile picture updated successfully.";
            } else {
                echo "Error updating profile picture.";
            }
        } else {
            echo "Invalid file format. Please upload a JPG, PNG, or GIF file.";
        }
    } else {
        echo "Please select an image to upload.";
    }

    // Close the database connection
    //mysqli_close($conn);

?>