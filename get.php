<?php

$name = "Constance Skinner";
include 'connect.php';
$sql = "SELECT id FROM donor_registration WHERE name = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the donor name parameter to the query
    $stmt->bind_param("s", $name);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        // Fetch the donor ID
        $row = $result->fetch_assoc();
        echo $donor_id = $row['id'];
    } else {
        echo "No donor found with the name " . htmlspecialchars($donor_name);
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing the query: " . $conn->error;
}