<?php

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  // Update last active time in the database
  $user_id = $_SESSION['user_id'];
  $stmt = $conn->prepare("UPDATE users SET last_activity = NOW() WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
}

// Retrieve the last active time from the database for the user
$user_id = $_SESSION['user_id']; // Replace with the user's ID
$stmt = $conn->prepare("SELECT last_activity FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($last_activity);
$stmt->fetch();

// Compare the last active time to the current time to determine if the user is online or offline
$current_time = time();
$inactive_time = 300; // 5 minutes of inactivity
$is_online = ($current_time - strtotime($last_activity)) < $inactive_time;

?>