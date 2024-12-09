<?php
include('connection.php');
include('connect.php');
session_start();

// Check if the user is logged in, otherwise redirect with an alert message
if (!isset($_SESSION['admin_email'])) {
    echo "<script>alert('You are not logged in. Please log in to continue.'); window.location.href = 'login.php';</script>";
    exit();
} else {
    $email = $_SESSION['admin_email'];
    $name = $_SESSION['admin_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Blood Donation Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        /* General Body Styling */
        body {
            background-color: #dc3545;
            /* Red background for entire page */
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
            /* Allows the heading to take up the remaining space */
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
            text-align: center;
            width: 60%;
            /* Sets width to 60% */
            margin: auto;
            /* Centers the container horizontally */
            margin-top: 100px;
            margin-bottom: 20px;
        }

        /* Link and Button Styling */
        .dashboard-links a {
            color: #dc3545;
            font-weight: bold;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f9fa;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            /* Equal top margin */
            margin-bottom: 20px;
            /* Equal bottom margin */
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .dashboard-links a:hover {
            background-color: #dc3545;
            color: white;
            transform: translateY(-3px);
        }

        .btn-email {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .btn-email:hover {
            background-color: #bd2130;
            color: white;
        }

        .container.mt-4.container-box {
            width: 90%x;
        }

        /* Footer Styling */


        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container-box {
                width: 90%;
                /* Increase width to 90% on smaller screens */
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <?php
    include('header.php');
    ?>

    <!-- Main Container for Dashboard Links -->
    <div class="container mt-4 container-box"
        style="width: 60%; margin: 0 auto;">
        <h3 class="mb-4">Welcome,
            <?php echo isset($_SESSION['admin_name']) ? htmlspecialchars($_SESSION['admin_name']) : 'Admin'; ?></h3>
        <p>Manage blood donation records and view eligible donors below.</p>

        <!-- Dashboard Links Centered and Organized -->
        <div class="row justify-content-center dashboard-links">
            <div class="col-6 col-md-4">
                <a href="donor-reg.php">Donor Registration</a>
            </div>
            <div class="col-6 col-md-4">
                <a href="donor-list.php">Donor List</a>
            </div>
            <div class="col-6 col-md-4">
                <a href="stock-blood-list.php">Stock Blood List</a>
            </div>
            <div class="col-6 col-md-4">
                <a href="out-stock-blood-list.php">Out Stock Blood List</a>
            </div>
            <div class="col-6 col-md-4">
                <a href="exchange-blood-donor-registration.php">Exchange Blood Donor Registration</a>
            </div>
            <div class="col-6 col-md-4">
                <a href="exchange-blood-list.php">Exchange Blood List</a>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <?php
    include('footer.php');
    ?>
    <!--
      Bootstrap
      JS
      and
      dependencies
      -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>