<?php
include('connection.php');
include('connect.php');
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['admin_email'])) {
    echo "<script>alert('You are not logged in. Redirecting to login page.'); window.location.href='login.php';</script>";
    exit();
}

$email = $_SESSION['admin_email'];
$name = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Stock Blood List - Blood Donation Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
    /* General Body Styling */
    body {
        background-color: #dc3545;
        color: white;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        font-family: Arial, sans-serif;
    }

    /* Header */
    .header {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        background-color: #c82333;
        position: relative;
    }

    .header h2 {
        flex-grow: 1;
        text-align: center;
        margin: 0;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        padding: 5px 15px;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn-danger a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .btn-danger:hover {
        background-color: #bd2130;
    }

    .btn-danger:hover a {
        color: white;
    }

    /* Main Container Styling */
    .container-box {
        background-color: white;
        color: #dc3545;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        margin: auto;
        margin-top: 100px;
        width: 30%;
    }

    /* Footer Styling */
    .footer {
        background-color: #c82333;
        color: white;
        padding: 10px;
        text-align: center;
        margin-top: auto;
        width: 100%;
    }

    /* Table Styling */
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dc3545;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #c82333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <h2>Blood Donation Management System</h2>
        <button class="btn btn-danger">
            <a href="logout.php">Logout</a>
        </button>
    </div>

    <!-- Main Container for the Stock Blood List -->
    <div class="container mt-4 container-box">
        <h3 class="mb-4 text-center">Available Blood Stock</h3>


        <?php
        // Fetch available blood stock from the database
        $query = "SELECT bgroup, COUNT(*) as quantity FROM donor_registration  GROUP BY bgroup";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo '<thead>';
            echo '<tr><th>Blood Group</th><th>Quantity</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['bgroup']) . '</td>';
                echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No available blood stock found.</p>';
        }
        ?>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <h6>&copy; 2024 Blood Donation Management System</h6>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>