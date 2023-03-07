<?php

include('config.php');


$sql = "SELECT COUNT(*) as num_users FROM users";


$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the number of users
    $row = mysqli_fetch_assoc($result);
    $num_users = $row['num_users'];

} else {
    // Display an error message if the query failed
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
//mysqli_close($conn);
?>
