<?php
session_start();
include("connect.php"); // Database connection

// Check if admin email is stored in the session
if (isset($_SESSION['admin_email'])) {
  $admin_email = $_SESSION['admin_email'];

  // Update the is_logged_in status to 0 for the current admin
  $update_query = "UPDATE admins SET is_logged_in = 0 WHERE email = ?";
  $stmt = $conn->prepare($update_query);

  if ($stmt) {
    $stmt->bind_param("s", $admin_email);
    $stmt->execute();
    $stmt->close();
  } else {
    // Handle SQL error
    echo "Failed to prepare the statement.";
  }

  // Clear the session and redirect to login
  session_unset();
  session_destroy();

  header("Location: login.php");
  exit();
} else {
  echo "No admin is currently logged in.";
}
